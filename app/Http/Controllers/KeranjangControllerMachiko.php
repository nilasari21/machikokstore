<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk;
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
                         ->where('user_id','=','2')
                    // ->where('produk.status','=','Ready Stock')
                         ->get();
                         // dd($data);
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
        $data->user_id = 2;
        $data->id_produk_ukuran = $request->id_produk_ukuran;
        $data->jumlah = $request->jumlah;
        $data->keterangan = $request->keterangan;
        $berat= Produk::where('id','=',$request->produk_id)
                    ->first();
        $data->berat_total=$berat->berat*$request->jumlah;
        $hargatambah=0;
        $produkukuran= ProdukUkuran::where('produk_id','=',$request->produk_id)
                    ->first();
        if(count($produkukuran)!=0){
            $hargatambah=$produkukuran->harga_tambah;
        }else{
            $hargatambah=0;
        }
        $produk= Produk::find($request->produk_id);
        $data->Total_harga=$produk->harga * $request->jumlah+$hargatambah;
        $data->save();

        
        return redirect()
                ->back()
                ->with('succes', 'Berhasil simpan di keranjang');

       //
    }

    public function getDelete($id)
    {
        $data = Keranjang::where('id_keranjang','=',$id);
        $data->delete();
        return redirect('keranjang');
    }

    public function postUpdate(Request $request)
    {
        // proses update data
        $i=1;
        foreach ($request->jumlah1 as $key ) {
            $data=Keranjang::where('id_keranjang','=',$request->idkeranjang[$i])->first();
            $data->jumlah=$key;
            $data->save();
            $i++;       
        }
        
        /*$data->jumlah=$request->jumlah1;
        $data->save();*/
        return redirect('keranjang');
    }

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
