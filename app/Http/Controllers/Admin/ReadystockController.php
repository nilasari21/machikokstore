<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
// use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Metode;
use App\Models\Ukuran;
use Image;
use App\Models\ProdukUkuran;


class ReadystockController extends Controller {

   public function index()
    {
        $data = Produk::join('kategori_produk','produk.id_kategori','=','kategori_produk.id_kategori')
                ->select('produk.*','kategori_produk.*')
                ->where('produk.status','=','Ready Stock')
                ->get();

        return view('vendor.backpack.base.readystock')->with('data',$data);
       //
    }
    public function tambah()
    {
        $kategori = Kategori::all()-> where('status','=','Aktif');
        $ukuran = Ukuran::all()-> where('status','=','Aktif');
        $metode = Metode::all();
        
        return view('vendor.backpack.base.tambahrs')->with(compact('kategori',$kategori,'ukuran',$ukuran,'metode',$metode));
       //
    }

    public function simpannonukuran(Request $request)
    {
      $produk = new Produk; 
      
      
     // $metodeproduk = new MetodeProduk;
      if($request->hasFile('image')){
        $file = ('.img/produk/client');
        $foto=$request->file('image');
        $foto = time().'.'.$request->image->getClientOriginalExtension();
        // Image :: make ($foto)->resize(100, 100)->getRealPath();
        $request->image->move(public_path('.img/produk/client'), $foto);
        // $foto=save(($file ),$foto);
        $produk->foto=$foto;
        
      }
      $produk->nama_produk= $request->nama_produk;
      $produk->harga= $request->harga;
      $produk->stock_total= $request->stock_total;
      $produk->berat= $request->berat;
      $produk->minimal_beli= $request->minimal_beli;
      $produk->batas_jam= $request->batas_jam;
      $produk->status="Ready Stock";
      
      $produk->id_kategori=$request->id_kategori;
      
      $produk->save();
      $produk->metode()->attach($request->metode_id);
      return redirect()
                ->back()
                ->with('status', 'Gambar Berhasil di Upload');

       //
    }
    public function simpanukuran(Request $request)
    {
      $produk = new Produk; 
     // $metodeproduk = new MetodeProduk;
      /*if($request->hasFile('foto')){
        $foto = time().$produk->getClientOriginalName();
        $foto->move('.img/produk/client', $foto);

        $data = array_merge(['upload' => ".img/produk/client/{$foto}"], $request->all());

        Project::create($data);
      }*/
      if($request->hasFile('image')){
        $foto = time().'.'.$request->image->getClientOriginalExtension()->resize(200, 200);
        $request->image->move(public_path('.img/produk/client'), $foto);
        $produk->foto=$foto;

        
      }
      $produk->nama_produk= $request->nama_produk;
      $produk->harga= $request->harga;
      $produk->stock_total= $request->stock_total;
      $produk->berat= $request->berat;
      $produk->minimal_beli= $request->minimal_beli;
      $produk->batas_jam= $request->batas_jam;
      $produk->status="Ready Stock";
     
      $produk->id_kategori=$request->id_kategori;
      
      $produk->save();
      
      //$prod = [$produk->id];
      /*$a=['ukuran_id'=>$request->id];
      $b=['stock'=>$request->stock_];
      $c=['harga_tambah'=>$request->harga_tambah];*/
      // return $request->all();
      // if(count($request->id)==1){
      //   foreach ($request->id as $key => $value) {
          
        
      //     $ProdukUkuran = new ProdukUkuran();
      //     $ProdukUkuran->produk_id = $produk->id;
      //     $ProdukUkuran->ukuran_id = $request->id;
      //     $ProdukUkuran->stock = $request->stock_;
      //     $ProdukUkuran->harga_tambah= $request->harga_tambah;
      //     $ProdukUkuran->save();
      //   } 
      // }else{
        foreach ($request->id as $key=>$val ) {
          $ProdukUkuran = new ProdukUkuran();
          $ProdukUkuran->produk_id = $produk->id;
          $ProdukUkuran->ukuran_id = $val;
          $ProdukUkuran->stock = $request->stock_[$key];
          $ProdukUkuran->harga_tambah= $request->harga_tambah[$key];
          $ProdukUkuran->save();
      }
      
      // $pivotData = array($produkId => array('stock' => $stock, 'harga_tambah' => $harga_tambah));

      // $produk->ukuran()->sync($pivotData);
     
      // $produk->ukuran()->attach($request->id);
      // }
      
      

      $produk->metode()->attach($request->metode_id);
      return redirect()
                ->back()
                ->with('succes', 'Gambar Berhasil di Upload');
                
       //
    }
}