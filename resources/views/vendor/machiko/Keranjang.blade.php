@extends('vendor.machiko.machiko_template')

<script type="text/javascript">
        function startCalc(){
            interval = setInterval("calc()",1);}
        function calc(){
 
             satu = document.autoSumForm.nilai1.value; 
             dua = document.autoSumForm.nilai2.value;
             tiga = document.autoSumForm.nilai3.value;
             total = ((parseInt(satu)*parseInt(dua))+parseInt(tiga));
            document.autoSumForm.total.value=(satu*dua)+tiga;
        }
       function stopCalc(){
            clearInterval(interval);
        
    </script>
@section('content')
<p id="demo"></p>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
             <div class="col-md-8">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        <form method="post" action="#" name="autoSumForm">
                                            
                                            <table cellspacing="0" class="shop_table cart">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove">&nbsp;</th>
                                                        <th class="product-thumbnail">Foto</th>
                                                        <th class="product-name">Produk</th>
                                                        <th class="product-price">Ukuran</th>
                                                        <th class="product-quantity">Jumlah</th>
                                                        <th class="product-price">Harga</th>
                                                        <th class="product-price">Harga Tambah</th>
                                                        <th class="product-subtotal">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $row)
                                                    <tr class="cart_item">
                                                        <td class="product-remove">
                                                            <a title="Remove this item" class="remove" href="#">×</a> 
                                                        </td>

                                                        <td class="product-thumbnail">
                                                            <a href="#"><img src="{{asset("/.img/produk/client/$row->foto" )}}"></a>
                                                        </td>

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
                                                        
                                                        <td class="product-quantity">
                                                            <div class="quantity buttons_added">
                                                                
                                                                <input type="jumlah" onFocus="startCalc();" onBlur="stopCalc();" id="nilai1" size="4" class="input-text qty text" title="Qty" value="{{ $row->jumlah }}" min="0" step="1">
                                                                
                                                            </div>
                                                        </td>
                                                         <td class="product-price">
                                                            <span class="amount" id="nilai2" ><input type="hidden" value="{{ $row->harga }}" onFocus="startCalc();" onBlur="stopCalc();">{{ $row->harga }}</span> 
                                                        </td>
                                                        <?php 
                                                           if(count($row->nama_ukuran)==0){
                                                            ?>
                                                            <td class="product-price">
                                                                <span class="amount" id="nilai3" ><input type="hidden" value="0" onFocus="startCalc();" onBlur="stopCalc();">0</span> 
                                                            </td>
                                                       <?php
                                                       }else{ ?>
                                                        <td class="product-price">
                                                            <span class="amount" id="nilai3" ><input type="hidden" onFocus="startCalc();" onBlur="stopCalc();" value="{{ $row->harga_tambah }}" >{{ $row->harga_tambah }}</span> 
                                                        </td>
                                                        <?php
                                                       }
                                                       ?>
                                                       <td class="product-subtotal" >
                                                            <span class="amount" ><input name="total" type="text" id="demo" onchange='tryNumberFormat(this.form.thirdBox);' readonly></span> 
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td class="actions" colspan="8">
                                                            <input type="submit" value="Update Cart" name="update_cart" class="button">
                                                            <input type="submit" value="Proceed to Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                                        </td>

                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </form>

                                      
                                    </div>                        
                                </div>                    
                            </div>
            
            @endsection