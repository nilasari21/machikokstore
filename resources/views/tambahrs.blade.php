@extends('backpack::layout')

@section('content')
003366
<form method="POST"  >
   
    <div class="panel panel-card" style="padding:10px; ">
{{ csrf_field() }}

    <label for="upload">Upload foto</label>
        <input type="file" class="form-control" name="foto" required>
    <label> Nama Produk</label><br/>
        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required>
    <label> Kategori Produk </label><br/>
        <select class="form-control" name="id_kategori">
                        <option>Pilih jenis produk</option>
                        @foreach($kategori as $kate)
                        <option value="{{$kate->id_kategori}}" >
                            {{$kate->nama_kategori}}
                        </option>
                        @endforeach
        </select>
            
    <label> Harga </label><br/>
        <input type="text" class="form-control" name="harga" placeholder="Harga Produk" required>
    
    <label> Ukuran Tersedia </label>
    <div class="form-group"  >
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onClick="displayForm(this)" checked>
                     Tidak tersedia
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onClick="displayForm(this)">
                      Tersedia
            </label>
        </div>
    </div>

    <div class="formukuran" id="ukuran" style="display:none" >
        @foreach($ukuran as $ukuran)    
            <input type="checkbox" name="id_ukuran" value="{{$ukuran->id_ukuran}}" > &nbsp;
            {{$ukuran->nama_ukuran}} </input>
            <input type="text" name="stock_" placeholder="stock" style="padding:5px; width:10%" >
            <input type="text" name="harga_tambah" placeholder="harga tambah dari harga pokok produk" style="padding:5px; width:25%" >
            <br/><br/>
        @endforeach     
    </div>
    <label>Stock Total</label>
        <input type="text" class="form-control" name="stock_total" placeholder="Berat" required>
    <label>Berat</label>
        <input type="text" class="form-control" name="berat" placeholder="Berat" required>
    <label>Minimal beli (Reseller)</label>
        <input type="text" class="form-control" name="minimal_beli" placeholder="minimal beli" required>
    
    <label>Batas Akhir Pembayaran</label>
    <input type="text" class="form-control" name="batas_jam" placeholder="Batas bayar(nominal jumlah jam)" required> 
    <label>Metode Pembayaran</label>
    <br/>
    @foreach($metode as $metode)
        <input type="checkbox" name="metode_id" value="{{$metode->id_metode_bayar}}">
        {{$metode->metode}} 
        <br/>
    @endforeach
  
       {{ csrf_field() }}
    <a href="#" type="submit" id="buttonukuran" class="btn btn-fw btn-success waves-effect waves-effect" style="display:none" >Tambah</a>
    <button type="submit" id="buttonnonukuran" class="btn btn-fw btn-info waves-effect waves-effect">Tambah</button> 
    </div>

</form>  
</div>  
@endsection