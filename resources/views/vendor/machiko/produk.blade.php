@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach ($data as $row)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src=".img/produk/client/{{ $row->foto }}" alt="">
                        </div>
                        <h2><a href="#">{{ $row->nama_produk }}</a></h2>
                        <div class="product-carousel-price">
                            <ins>Rp{{ $row->harga }}</ins> 
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Detail</a>
                        </div>                       
                    </div>
                </div>
                @endforeach
               
            </div>
            
            @endsection