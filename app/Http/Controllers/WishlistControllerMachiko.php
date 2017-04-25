<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\ProdukUkuran;
use Illuminate\Http\Request;

class WishlistControllerMachiko extends Controller {

    public function index() {
        // $data=[];
        
        $data = Wishlist::join('produk','produk.id','=','wishlist.id_produk')
                         ->where('id_user','=','1')
                         ->get();
       
        return view('vendor.machiko.wishlist')->with('data',$data);
    }
    public function tambah(Request $request)
    {
        
        $data = new Wishlist; // new Model
        
        $data->id_produk = $request->produk_id;
        $data->id_user = 1;
        
        $data->save();

        
        return redirect('wishlist');
                

       //
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
