<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Penerima;
use App\Models\Keranjang;
use App\Models\Metode;
use DB;
use RajaOngkir;
// use App\Models\Penerima;


use Illuminate\Http\Request;

class TransaksiControllerMachiko extends Controller {

    public function index() {
      
        $data = Produk::join('detail_transaki','transaksi.id_transaksi','=','detail_transaki.id_transaksi')
                     ->join('konfirmasi','konfirmasi.id_konfirmasi','=','transaksi.id_konfirmasi')
                     ->join('penerima','transaksi.id_penerima','=','penerima.id_penerima')
                     ->join('metode_produk','metode_produk.id_metode','=','transaksi.id_metode')
                     ->select('transaksi.*','detail_transaki.*','konfirmasi.*','penerima.*')
                // ->where('produk.status','=','Ready Stock')
                     ->get();

        return view('vendor.machiko.produk')->with('data',$data);
    }

      public function checkout($id) {
        $keranjang = Keranjang::join('produk','produk.id','=','keranjang.produk_id')
                         // ->join('users','users.id','=','keranjang.user_id')
                         ->leftJoin('produk_ukuran','produk_ukuran.id_detail','=','keranjang.id_produk_ukuran')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('keranjang.*','produk.*','produk_ukuran.*','ukuran.*')
                         ->where('user_id','=','2')
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
                    // ->where('produk.status','=','Ready Stock')
       
         $beratharga = Keranjang::join('produk','produk.id','=','keranjang.produk_id')
                         // ->join('users','users.id','=','keranjang.user_id')
                         ->leftJoin('produk_ukuran','produk_ukuran.id_detail','=','keranjang.id_produk_ukuran')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select((DB::raw ('SUM(keranjang.berat_total) as berat')),(DB::raw ('SUM(keranjang.Total_harga) as total')))
                         ->where('user_id','=','2')
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
        
        $data = Transaksi::join('users','users.id','=','transaksi.id_user')
                        ->join('penerima','transaksi.id_penerima','=','penerima.id_penerima')
                        ->where('transaksi.id_user','=',$id)
                        ->first();
        $penerima = Penerima::where('penerima.id_user','=',$id)
                        ->get();
       
                        // return $jumlahkeranjang;
        $metodebanyak=  Metode::select('*',(DB::raw ('count(metode.metode) as c')))
                              ->join ('metode_produk','metode_produk.metode_id','=','metode.id' )
                              ->JOIN ('keranjang' ,'metode_produk.produk_id','=','keranjang.produk_id')
                              ->where('keranjang.user_id','=',$id)
                              ->GROUPBY ('metode.metode')
                              ->HAVING ('c' ,'=',Keranjang::count('produk_id'))
                              ->get();
// return $metodebanyak;
// dd($keranjang);
         
         $kota = RajaOngkir::Kota()->all();
        // return $hasil;
                        
        return view('vendor.machiko.checkout')->with(compact('keranjang',$keranjang,'data',$data,'penerima',$penerima,'metodebanyak',$metodebanyak,'beratharga',$beratharga,'kota',$kota));
    }
 public function hasil($kota_tujuan,$radio,$berat) {
        $data = RajaOngkir::Kota()->all();

       
        $hasil = RajaOngkir::Cost([
            'origin'        => 501, // id kota asal
            'destination'   => $kota_tujuan, // id kota tujuan
            'weight'        => $berat, // berat satuan gram
            'courier'       => $radio, // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
         
        // return $hasil;
        return $hasil;

    }
    public function getId($kota_asal) {
        

       
       $data = RajaOngkir::Kota()->search('city_name', $name = $kota_asal)->get();
         
        // return $hasil;
        return $data;

    }
    /*select metode.metode,count(metode) as jumlah 
from keranjang 
INNER join 
metode_produk ON keranjang.produk_id = metode_produk.produk_id 
INNER JOIN metode ON metode.id = metode_produk.metode_id
where keranjang.user_id=2
GROUP BY metode.metode  
ORDER BY `jumlah`  DESC*/
    /*public function tambah(Request $request)
    {
        
        $data = new Transaksi; // new Model
        
        $data->status_bayar = "Belum_lunas";
        $data->status_beli = "keranjang";
        $data->save();

        foreach ($request->id as $key=>$val ) {
          $ProdukUkuran = new ProdukUkuran();
          $ProdukUkuran->produk_id = $produk->id;
          $ProdukUkuran->ukuran_id = $val;
          $ProdukUkuran->stock = $request->stock_[$key];
          $ProdukUkuran->harga_tambah= $request->harga_tambah[$key];
          $ProdukUkuran->save();
      }
        return redirect('kategori');

       //
    }
*/
}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
