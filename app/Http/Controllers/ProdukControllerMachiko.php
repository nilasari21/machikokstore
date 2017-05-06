<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProdukUkuran;

use Illuminate\Http\Request;

class ProdukControllerMachiko extends Controller {

    public function index() {
      
        $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                // ->where('produk.status','=','Ready Stock')
                ->GROUPBY('produk.id')
                
                ->get();
        $kategori = Kategori::where('kategori_produk.status','=','Aktif')
                ->get();
        
        return view('vendor.machiko.produk')->with(compact('data',$data,'kategori',$kategori));
    }
    public function filter(){
         $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                // ->where('produk.status','=','Ready Stock')
                ->get();
        $kategori = Kategori::where('kategori_produk.status','=','Aktif')
                ->get();
        return view('vendor.machiko.produk')->with(compact('data',$data,'kategori',$kategori));
    }
   
    public function detail($id) {
      
        $data = Produk::where('id',$id)->first();
                		
        $ukuran= ProdukUkuran::where('produk_ukuran.produk_id','=',$id)
                            ->join('ukuran','ukuran.id','=','produk_ukuran.ukuran_id')
                            ->get();
        return view('vendor.machiko.detailProduk')->with(compact('data',$data,'ukuran',$ukuran));
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/