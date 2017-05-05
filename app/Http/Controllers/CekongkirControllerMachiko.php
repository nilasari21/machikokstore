<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Httpful\Request;
use Illuminate\Http\Request;
// Include('Httpful.Phar');
use RajaOngkir;

class CekongkirControllerMachiko extends Controller {

    public function index() {
        $data = RajaOngkir::Kota()->all();

        return view('vendor.machiko.cekongkir')->with('data',$data);

    }
    public function hasil(Request $request) {
        $data = RajaOngkir::Kota()->all();

       
        $hasil = RajaOngkir::Cost([
            'origin'        => 501, // id kota asal
            'destination'   => $request->kota_tujuan, // id kota tujuan
            'weight'        => $request->berat, // berat satuan gram
            'courier'       => $request->courier, // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
         
        // return $hasil;
        return view('vendor.machiko.cekongkir2')->with(compact('hasil',$hasil,'data',$data));

    }
        // $data=[];
        
        // $data = 
       

}
/*join('produk_ukuran','produk_ukuran.produk_id','=','produk.id')
                        ->select('produk.*','produk_ukuran.*')*/
