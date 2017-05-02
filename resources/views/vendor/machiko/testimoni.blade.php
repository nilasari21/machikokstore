@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
    <div class="zigzag-bottom">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('testimoni/tambah') }}">Buat Testimoni</a>
            </div>
        </div>
        <br/>
       <div class="row">
                @foreach ($data as $row)
                <div class="col-md-3 col-sm-6" >
                    <div class="single-shop-product" >
                        
                        <div class="product-upper">
                            <img src="{{asset("/.img/produk/client/". $row->foto )}}" width="20px" height="20px"> 
                            {{ $row->name }}
                        </div>
                        <?php 
                        if($row->foto_testi=="NULL"){?>
                        kosong
                        <?php
                        }elseif($row->foto_testi!="NULL"){?> 
                        <div class="product-upper">
                            <img src="{{asset("/.img/produk/client/". $row->foto_testi )}}">
                        </div> 
                        <?php
                        }
                        ?>
                         
                        
                        <div>
                            <p>{{ $row->Keterangan }}</p>
                        </div>                   
                    </div>
                </div>
                @endforeach
               
            </div>
            
   
@endsection
 