@extends('vendor.machiko.machiko_template')


@section('content')
<p id="demo"></p>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
             <div class="col-md-8">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        <form method="post" action="#" name="autoSumForm">
                                            
                                            <table cellspacing="0" class="shop_table cart" >
                                                <thead >
                                                    <tr >
                                                        <th class="product-remove" style="background:#66CC99">&nbsp;</th>
                                                        <th class="product-thumbnail" style="background:#66CC99">Foto</th>
                                                        <th class="product-name" style="background:#66CC99">Produk</th>
                                                        <th class="product-price" style="background:#66CC99">Ukuran</th>
                                                        <th class="product-quantity" style="background:#66CC99">Jumlah</th>
                                                        <th class="product-price" style="background:#66CC99">Harga</th>
                                                        <th class="product-price" style="background:#66CC99">Harga Tambah</th>
                                                        <th class="product-subtotal" style="background:#66CC99">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $i=1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                    <tr class="cart_item">
                                                        <td class="product-remove">
                                                            <a title="Remove this item" class="remove" href="{{ url('keranjang/delete/'.$row->id_keranjang) }}" onclick="return confirm('Anda yakin ingin menghapus .$row->nama_produk?')">×</a> 
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
                                                                
                                                                <input type="number" id="nilai1{{$i}}" name="jumlah" class="item_quantity" min="1"   value="{{ $row->jumlah }}">
                                                                
                                                            </div>
                                                        </td>
                                                         <td class="product-price">
                                                            <span class="amount"  ><input type="hidden" id="nilai2{{$i}}" value="{{ $row->harga }}" onFocus="startCalc();" onBlur="stopCalc();">{{ $row->harga }}</span> 
                                                        </td>
                                                        <?php 
                                                           if(count($row->nama_ukuran)==0){
                                                            ?>
                                                            <td class="product-price">
                                                                <span class="amount" ><input type="hidden" id="nilai3{{$i}}"  value="0" onFocus="startCalc();" onBlur="stopCalc();">0</span> 
                                                            </td>
                                                       <?php
                                                       }else{ ?>
                                                        <td class="product-price">
                                                            <span class="amount" ><input type="hidden"  id="nilai3{{$i}}" onFocus="startCalc();" onBlur="stopCalc();" value="{{ $row->harga_tambah }}" >{{ $row->harga_tambah }}</span> 
                                                        </td>
                                                        <?php
                                                       }
                                                       ?>
                                                       <td class="product-subtotal" >
                                                            <span class="amount" ><input name="total" type="text" id="total{{$i}}"  value="" readonly></span> 
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="8">
                                                            <strong>Total</strong>
                                                            <input name="total" type="text" id="jumlah"  value="" readonly>
                                                    <tr>
                                                        <td class="actions" colspan="8">
                                                            <!-- <input type="submit" value="Update Cart" name="update_cart" class="button" style="background:#66CC99"> -->
                                                            <button type="submit" class="add_to_wishlist">Update keranjanjang</button>
                                                           <button type="submit" class="add_to_wishlist">Checkout</button>
                                                        </td>

                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </form>

                                      
                                    </div>                        
                                </div>                    
                            </div>
            
            @endsection

            @section('js')
            <script type="text/javascript">
        $(document).ready(function (){
            @php
            $i=1;
            
            @endphp
            var  total=0;
            @foreach ($data as $row)

            var satu = document.getElementById("nilai1{{$i}}").value; 
             console.log(satu);
            var dua = document.getElementById("nilai2{{$i}}").value; 
            console.log(dua);
             var tiga = document.getElementById("nilai3{{$i}}").value; 
             console.log(tiga);
             var hasil = document.getElementById("total{{$i}}").value=( parseInt(satu)* parseInt(dua))+ parseInt(tiga);

             console.log(hasil);
             total=total+( parseInt(satu)* parseInt(dua))+ parseInt(tiga);
             document.getElementById("jumlah").value=total;
             console.log(total);
             @php
             $i++;
             
             @endphp
             @endforeach

        });
             
        
    </script>

    @endsection