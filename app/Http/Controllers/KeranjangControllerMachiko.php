<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\ProdukUkuran;
use Illuminate\Http\Request;

class KeranjangControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        $data = Keranjang::join('produk','produk.id','=','keranjang.produk_id')
                         // ->join('users','users.id','=','keranjang.user_id')
                         ->leftJoin('produk_ukuran','produk_ukuran.id_detail','=','keranjang.id_produk_ukuran')
                         ->leftjoin('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                         ->select('keranjang.*','produk.*','produk_ukuran.*','ukuran.*')
                         ->where('user_id','=','1')
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
        // $data->ukuran= new ProdukUkuran;
        /*$ukuran= ProdukUkuran::join('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                            ->where('produk_ukuran.produk_id','=','keranjang.produk_id'
                              ,'and','keranjang.id_produk_ukuran','=','produk_ukuran.id_detail')

                            ->get();*/
        return view('vendor.machiko.keranjang')->with('data',$data);
    }
    public function tambah(Request $request)
    {
        
        $data = new Keranjang; // new Model
        
        $data->produk_id = $request->produk_id;
        $data->user_id = 1;
        $data->id_produk_ukuran = $request->id_produk_ukuran;
        $data->jumlah = $request->jumlah;
        $data->keterangan = $request->keterangan;
        $data->save();

        
        return redirect()
                ->back()
                ->with('succes', 'Berhasil simpan di keranjang');

       //
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
