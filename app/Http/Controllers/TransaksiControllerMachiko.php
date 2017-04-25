<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;


use Illuminate\Http\Request;

class TransaksiontrollerMachiko extends Controller {

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
