@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <button type="submit" class="add_to_wishlist" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow">Tambah_Testimoni</button> 
               </div> 
            </div>
            <div class="col-md-6 col-sm-6">
                     @foreach ($data as $row)
                        <div class="single-shop-product">
                            <div class="col-md-3 col-sm-6">
                                <img src="{{asset("/.img/produk/client/". $row->foto )}}" width="20px" height="20px"> 
                                {{ $row->name }}   
                            </div>
                            <div class="col-md-3 col-sm-6">
                                
                            </div>
                        <div class="product-upper">
                            
                            <img src="{{asset("/.img/produk/client/". $row->foto )}}">
                            <!-- <img src="{{asset("vendor/machikoo/img/user.jpg")}}" width="20px" height="20px"> -->
                        </div>
                         
                        <div>
                            <p>{{ $row->Keterangan }}</p>
                        </div>
                </div >
                @endforeach
               </div>
            
            
            @endsection
            