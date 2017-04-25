@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               
                <div class="col-md-6 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{asset("/.img/produk/client/". $data->foto )}}">
                            <!-- <img src="{{asset("vendor/machikoo/img/user.jpg")}}" width="20px" height="20px"> -->
                        </div>
                        
                        <div class="product-carousel-price">
                            <ins>{{ $data->nama_produk }}</ins> 
                        </div>  
                        <div>
                            <p>{{ $data->keterangan }}</p>
                        </div>
                        
                    </div>
                </div >
                <div class="col-md-6 col-sm-6">
                    <div class="col-md-6">
                        Rp{{ $data->harga }},-
                    </div>
                    <div class="col-md-6">
                         <form method="POST"  action="{{ url('wishlist/tambah') }}">
                        {{ csrf_field() }}
                            <input type="hidden" size="4" name="produk_id" value="{{ $data->id }}">
                            <button type="submit" class="add_to_wishlist" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow">Tambah_Wishlist</a>
                        </form>
                    </div>
                    <br/>
                    <br/>
                    <div class="col-md-6">
                        {{ $data->status }}
                    </div>
                     <?php 
                        if( $data->status =="Ready Stock"){ ?>
                         
                         <div class="col-md-6">
                        {{ $data->stock_total }} item
                        </div>   
                        <?php
                        }else{ ?>
                        <div class="col-md-6">
                        {{ $data->tgl_awal_po }} sampai {{ $data->tgl_akhir_po }}
                        </div> 
                    <?php
                        }
                    ?>
                    <br/><br/>
                    <form method="POST"  action="{{ url('keranjang/tambah') }}">
                        {{ csrf_field() }}
                        <input type="hidden" size="4" name="produk_id" value="{{ $data->id }}">
                    <div class="col-md-6">
                         <div class="quantity buttons_added">
                            Jumlah
                            <input type="number" size="4" name="jumlah" class="input-text qty text" title="Qty" min="1" step="1" required>
                        
                        </div>
                    </div>
                    
                    <?php 
                        if( count($ukuran)==0){ ?>
                         
                         
                        <?php
                        }else{ ?>
                    <div>
                    <div class="col-md-2">
                        Ukuran
                    </div>
                        <div class="col-md-4" style="padding-left:0px">

                            <div class="quantity buttons_added">
                                
                                <select class="form-control" name="id_produk_ukuran" style="border: 1px solid #DF5E96;">
                                    
                                    @foreach($ukuran as $uku)
                                    <option value="{{$uku->id_detail}}" >
                                        {{$uku->nama_ukuran}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                    <br/><br/>
                    Keterangan tambahan (optional)
                    
                     <textarea id="editor1" name="keterangan" rows="10" cols="50" style="border: 1px solid #DF5E96;">
                    </textarea>

                    
                  
                  <div class="col-md-6">
                        <button type="submit" class="add_to_wishlist">Beli</button>
                </div> 
                </form> 
                </div>
                
               
            </div>
            
            @endsection