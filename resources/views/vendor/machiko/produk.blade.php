@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            

           <!--  <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Kategori</h2>
                    <div class="panel-group category-products" id="accordian">
                       <div class="panel panel-default">
                                 @foreach($kategori as $kate)
                                 
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="{{url('kategori/'. $kate->id)}}">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    <a href="{{url('kategori/'. $kate->id)}}">{{$kate->nama_kategori}}</a>
                                    <span class="label label-success pull-right"></span>
                                </a>
                            </h4>
                        </div>
                                  
                                  
                                  @endforeach
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row" >
                @foreach ($data as $row)
                <!-- <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src=".img/produk/client/{{ $row->foto }}" alt="">
                        </div>
                        <h2><a href="#">{{ $row->nama_produk }}</a></h2>
                        <div class="product-carousel-price">
                            <ins>Rp{{ $row->harga }}</ins> 
                        </div>  
                        <input type="hidden" class="form-control" name="harga" value="{{ $row->id }}" required>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('machikokstore/detailProduk/'.$row->id ) }}">Detail</a>
                        </div>                       
                    </div>
                </div> -->
                <!-- <div class="col-sm-10"> -->
                <div class="col-sm-3">
            <div class="thumbnail">
                <div class="hover01 column">

                    <figure> <img src=".img/produk/client/{{ $row->foto }}" class="img-responsive" style="width:100%"></figure>   
                    <!--  -->
                </div>

                <div class="caption">
                </br>
            </br>
        </br>
    </br>
    <h4><p style="font-family:Roboto">{{ $row->nama_produk }}</p></h4>
    <h5><p>Rp {{ $row->harga }},00</p></h5>
    <p>
        <hr>
        <center>
            <!-- <a href="{{ url('machikokstore/detailProduk/'.$row->id ) }}" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> lihat selengkapnya</a> -->
            <form method="POST"  action="{{ url('wishlist/tambah') }}">
                        {{ csrf_field() }}
                            <input type="hidden" size="4" name="produk_id" value="{{ $row->id }}">
                            <button type="submit" value="Submit"  style="text-transform:capitalize;font-family:Raleway"><i class="fa fa-heart" color="#0000" ></i> Tambah Wishlist</button>
                        </form>
        </center>
        <hr>
    </p>
</div>
</div>
<p style="text-align:center;color:#66CC99;font-family:Roboto">
<a href="{{ url('machikokstore/detailProduk/'.$row->id ) }}"><strong>{{ $row->nama_produk }}</strong></a>
<br/>
Rp {{ $row->harga }},00
</p>
 <br/>
 <br/>
</div>

                @endforeach
               <!-- </div> -->
            </div>
           
            @endsection