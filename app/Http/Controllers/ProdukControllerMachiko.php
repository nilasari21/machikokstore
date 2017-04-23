<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Produk;

use Illuminate\Http\Request;

class ProdukControllerMachiko extends Controller {

    public function index() {
      
        $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                ->where('produk.status','=','Ready Stock')
                ->get();

        return view('vendor.machiko.produk')->with('data',$data);
    }

}