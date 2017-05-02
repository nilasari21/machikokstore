@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               
                <div class="col-md-6 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src=".img/produk/client/{{ $data->foto }}">
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
                    <div class="col-md-3">
                        Rp{{ $data->harga }},-
                    </div >
                    <div class="col-md-3">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="#">Tambah ke Wishlist</a>
                    </div>
                    <div class="col-md-3">
                        {{ $data->status }}
                    </div >
                    <div class="col-md-3">
                        {{ $data->stock_total }}
                    </div>
                    <div class="quantity buttons_added">
                        
                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="1" step="1">
                        
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
            
            @endsection