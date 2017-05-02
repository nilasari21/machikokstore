@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
           
            <div class="col-md-9 padding-right" style="width:100%">
        <div class="product-details"><!--product-details-->
        <div class="col-sm-3">
           <img src="{{asset("/.img/produk/client/". $data->foto )}}" >     
           <!-- <p>keterangan : {{$data->keterangan}}</p>    -->
    </div>
    <div class="category-tab shop-details-tab"><!--category-tab-->
    <!-- <div class="col-sm-4">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#reviews" data-toggle="tab">Details</a></li>
        </ul>
    </div> -->
    <div class="tab-content">
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-4">
                <br />
                <h1 class="item_name" style="font-family:Roboto">Keterangan</h1>
            <hr>
                <p style="text-align:justify">{{$data->keterangan}}</p>
                
            </div>
        </div>

    </div>
</div>
 
    <div class="col-sm-5 simpleCart_shelfItem anotherCart_shelfItem">
        <div class="product-information">
            <i class="item_thumb" style="display:none"></i>
            <i class="item_productid" style="display:none"></i>
            <i class="item_price" style="display:none"></i>
            <div>
              <h1 class="item_name" style="font-family:Roboto">{{ $data->nama_produk }}</h1>
            <form method="POST"  action="{{ url('wishlist/tambah') }}">
                        {{ csrf_field() }}
                            <input type="hidden" size="4" name="produk_id" value="{{ $data->id }}">
                            <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Tambah Wishlist</button>
                        </form>

            </div>
            
            <!-- <hr>
            {!! $data->desc !!}
             -->
            <p>
                <span>  
                    <span>{{ "Rp ".number_format($data->harga,2, ',', '.') }} </span>  
                </span>
            </p>
            <span>
                <form method="POST"  action="{{ url('keranjang/tambah') }}">
                        {{ csrf_field() }}
                        <input type="hidden" size="4" name="produk_id" value="{{ $data->id }}">
                    
                         <?php 
                        if( count($ukuran)==0){ ?>
                        <?php
                        }else{ ?>
                    <div>
                    <div class="col-md-8">
                        Pilih Ukuran
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
                         </div>
                    <?php
                        }
                    ?>
                    >
                    <br/><br/>
               <div class="alert alert-success">
                {{ $data->status }}
                 <?php 
                        if( $data->status =="Ready Stock"){ ?>
                         
                         <div class="col-md-12">
                          <strong>Stok</strong>
                        {{ $data->stock_total }} item
                        </div>   
                        <?php
                        }else{ ?>
                        <div class="col-md-12">
                          
                        {{ $data->tgl_awal_po }} sampai {{ $data->tgl_akhir_po }}
                        </div> 
                    <?php
                        }
                    ?>
                    <br/><br/>
               </div>
                  
               <label>Jumlah:</label>
               <div class="form-group">
                <input type="number" name="jumlah" class="item_quantity" min="1" max="{{$data->stok}}"  value="1">
                
                <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Masukan Ke Keranjang</button>

          </div>
      </form>
  </span>
  
</div><!--/product-information-->
</div>
</div><!--/product-details-->


    

</div>

            
            @endsection