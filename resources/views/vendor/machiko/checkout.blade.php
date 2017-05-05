@extends('vendor.machiko.machiko_template')
@section('css')

<link rel="stylesheet" href="{{asset("/vendor/machikoo/bootstrap-3.2.0/dist/css/bootstrap.min.css")}}">
@endsection
@section('content')
<div class="single-product-area">
    <div class="zigzag-bottom">
    </div>
    <div class="container">
    <div class="col-sm-12">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px;background:#66CC99;font-family:Raleway"><b>Checkout Keranjang</b></div>
                <div class="panel-body">
                <!--  -->
                <div class="row" style="margin-top:15px">
                  <div class="col-md-12">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        <form method="post" action="#" name="autoSumForm">
                                            <div class="table-responsive">
                                            <table cellspacing="0" class="shop_table cart" style="width:100%;align:center" >
                                                <thead >
                                                    <tr >

                                                        <th class="product-name" style="background:#66CC99;font-family:Raleway">Produk</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Ukuran</th>
                                                        <th class="product-quantity" style="background:#66CC99;font-family:Raleway">Harga</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Harga Tambah</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Jumlah</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Berat</th>
                                                        <th class="product-subtotal" style="background:#66CC99;font-family:Raleway">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($keranjang as $row)
                                                    <tr class="cart_item">
                                                       <td class="product-name">
                                                            <a href="#">{{ $row->nama_produk }}</a> 
                                                        </td>
                                                       <?php 
                                                           if(count($row->nama_ukuran)==0){
                                                            ?>
                                                            <td class="product-price">
                                                                <span class="amount">-</span> 
                                                            </td>
                                                       <?php
                                                       }else{ ?>
                                                       <td class="product-price">
                                                            <span class="amount">{{ $row->nama_ukuran }}</span> 
                                                        </td>
                                                        <?php
                                                       }
                                                       ?>
                                                        
                                                       
                                                        
                                                         <td class="product-price">
                                                            <span class="amount"  >{{ $row->harga }}</span> 
                                                        </td>
                                                        <?php 
                                                           if(count($row->nama_ukuran)==0){
                                                            ?>
                                                            <td class="product-price">
                                                                <span class="amount" >0</span> 
                                                            </td>
                                                       <?php
                                                       }else{ ?>
                                                        <td class="product-price">
                                                            <span class="amount" >{{ $row->harga_tambah }}</span> 
                                                        </td>
                                                        <?php
                                                       }
                                                       ?>
                                                       <td class="product-quantity">
                                                            <div class="quantity buttons_added">
                                                                
                                                                <input type="text" value="{{ $row->jumlah }}">
                                                                
                                                            </div>
                                                        </td>
                                                        <td class="product-name">
                                                            <span class="amount" >{{ $row->berat_total }} gram</span> 
                                                        </td>
                                                       <td class="product-subtotal" >
                                                            <span class="amount" >{{ $row->Total_harga }}</span> 
                                                        </td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                   
                                                     <tr>
                                                        <td colspan="9">
                                                            <strong>Berat total</strong>
                                                            {{ $row->berat }} gram
                                                        </td>                                                            
                                                    </tr>
                                                        

                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        </form>

                                      
                                    </div>                        
                                </div>                    
                            </div>
                <form class="form-horizontal" action="#" method="post">  
                    <input type="text" class="form-control" id="level" name="nama_produk" value="{{$data->level}}">
                    <div class="form-group">
                     <!--  <div class="col-sm-3 control-label"> -->
                      <label for="inputName" class="col-sm-3 control-label" >Jenis pemesanan</label>  
                      <!-- </div> -->
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" id="pesan" name="jenis_pesan" onChange="a()" data-toggle="modal" required/>
                            <option>Pilih jenis pemesanan</option>
                              <option value="Customer">Customer biasa</option>
                              <option value="Reseller">Reseller</option>
                              <option value="Dropshipper">Dropshipper</option>
                        </select>
                        <!-- modal -->
                          <div class="modal fade" id="modal" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Upgrade user</h4>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" class="form-control" id="id" name="iduser" value="{{$data->id}}">
                                      <input type="hidden" class="form-control" id="getlevel" name="iduser" value="">
                                      <p>Anda menggunakan pemesanan tidak sesuai dengan level user anda. Apakah anda ingin mengupgrade level user?</p>
                                      <p style="font-size:12px">Catatan: Perubahan level user memerlukan persetujuan admin. Selama perubahan belum disetujui, anda hanya bisa menggunakan jenis pemesaan Customer biasa</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <!-- end of modal -->

                            <!-- modal -->
                          <div class="modal fade" id="modal2" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Upgrade user</h4>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" class="form-control" id="id" name="iduser" value="{{$data->id}}">
                                      <input type="hidden" class="form-control" id="getlevel" name="iduser" value="">
                                      <p>Anda menggunakan pemesanan tidak sesuai dengan level user anda.</p>
                                      <p >Jika anda tetap memilih pilihan ini, anda harus menunggu persetujuan admin terlebih dahulu agar dapat melakukan pembayaran.
                                      </p>
                                      <p style="font-size:12px">Jika anda memilih Reseller, total pembayaran akan dihitung oleh admin (untuk mendapat potongan harga)
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
                                      
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <!-- end of modal -->
                            </div> 
                        <div class="col-sm-4"  id="toko">
                          <input type="text" class="form-control" name="nama_produk" placeholder="Nama Toko" >
                        </div>                    
                      </div>

                    
                      <?php
                      if(count($data)==0){?>
                      <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Tujuan Pengiriman</label>
                      <div class="col-sm-8">
                          <textarea style="border: 1px;width:100%;" disabled >Belum ada alamat </textarea>

                        </div>
                      </div>
                        <?php
                      }else{?>
                      <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Tujuan Pengiriman</label>
                      <div class="col-sm-8">
                          <textarea style="border: 1px;width:100%;" disabled >{{$data->nama_penerima}}, {{$data->no_hp_penerima}}, {{$data->provinsi}}, {{$data->kabupaten}}, {{$data->kecamatan}}, {{$data->alamat_lengkap}}</textarea>

                        </div>
                        </div>

                        <div class="form-group">
                      <div class="col-sm-3 control-label">
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="jenis_kelamin" />
                            <option>Pilih alamat lain</option>
                              @foreach($penerima as $row)
                                    <option value="{{$row->id_penerima}}" >
                                        {{$row->nama_alamat}}({{$row->nama_penerima}}/{{$row->alamat_lengkap}})
                                    </option>
                              @endforeach
                        </select>
                      </div>
                      <div class="col-sm-4">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('testimoni/tambah') }}">Tujuan pengiriman baru</a>
                      </div>
                    </div>
                        <?php
                      }
                      ?>
                       <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Metode pembayaran</label>
                        <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="metode" required/>
                            <option>Pilih metode pembayaran</option>
                              @foreach($metodebanyak as $row)
                                    <option value="{{$row->id}}" >
                                        {{$row->metode}}
                                    </option>
                              @endforeach
                        </select>
                        
                      </div>
                      </div>
                        <div class="form-group">
                      <div class="col-sm-3 control-label">
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="jenis_kelamin" required/>
                            <option>Pilih kurir</option>
                              <option value="jne">JNE</option>
                              <option value="pos">POS</option>
                        </select>
                      </div>
                      
                    </div>
                    
                    
                    </div>
                      <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-2">
                            <button type="submit" class="btn btn-success btn-block">Daftar</button>
                        </div>
                    </div>
                </form>   
                
  </div>

</div>
<!-- </body> -->
@endsection

@section('js')
    <script type="text/javascript">
    function a(){
      var option=document.getElementById('pesan').value;
      var level=document.getElementById('level').value;
      if(level=="Dropshipper" && option!="Dropshipper"){
        $('#modal2').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
      if(level=="Customer" && option!="Customer"){
        $('#modal').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
      if(level=="Reseller" && option!="Reseller"){
        $('#modal2').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
    }
             
        
    </script>

    @endsection
