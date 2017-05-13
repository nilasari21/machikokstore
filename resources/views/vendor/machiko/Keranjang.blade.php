@extends('vendor.machiko.machiko_template')


@section('content')
<p id="demo"></p>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
             <div class="col-md-12">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        <form method="post" action="{{url('keranjang/edit')}}" >
                                            <div class="table-responsive">
                                            <table cellspacing="0" class="shop_table cart" style="width:100%;align:center" >
                                                <thead >
                                                    <tr >
                                                        <th class="product-remove" style="background:#66CC99">&nbsp;</th>
                                                        <th class="product-thumbnail" style="background:#66CC99">Foto</th>
                                                        <th class="product-name" style="background:#66CC99">Produk</th>
                                                        <th class="product-price" style="background:#66CC99">Ukuran</th>
                                                        <th class="product-quantity" style="background:#66CC99">Harga</th>
                                                        <th class="product-price" style="background:#66CC99">Harga Tambah</th>
                                                        <th class="product-price" style="background:#66CC99">Jumlah</th>
                                                        <th class="product-price" style="background:#66CC99">Berat total(gram)</th>
                                                        <th class="product-subtotal" style="background:#66CC99">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                   <?php 
                                                   if(count($data)==0){?>
                                                    <tr>
                                                        <td colspan="9">
                                                            <strong>Belum ada data</strong>
                                                            
                                                            </td>
                                                    </tr>
                                                   <?php }else{ ?>
                                                    @php
                                                    $i=1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                    <input name="level" type="text" id="level"  value="{{$row->level}}" style="width:100px"readonly>
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
                                                       
                                                       {{ csrf_field() }}

                                                        <input name="idkeranjang[{{$i}}]" type="hidden" id="idkeranjang"  value="{{$row->id_keranjang}}" style="width:100px"readonly>
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

                                                       <td class="product-quantity">
                                                            <div class="quantity buttons_added">
                                                                
                                                                <input type="number" id="nilai1{{$i}}" name="jumlah1[]" class="item_quantity" min="1"   value="{{ $row->jumlah }}">
                                                                
                                                            </div>
                                                        </td>
                                                        <td class="product-name">
                                                            
                                                            <span class="amount" ><input name="berat" type="hidden" id="berat{{$i}}"  value="{{ $row->berat_total }} gram" style="width:70px" readonly></span> 
                                                            <span class="amount" ><input name="berat2" type="text" id="beratto{{$i}}"  value="" style="width:70px" readonly></span> 
                                                        </td>
                                                       <td class="product-subtotal" >
                                                            <span class="amount" ><input name="total" type="text" id="total{{$i}}"  value="" style="width:100px" readonly></span> 
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="9">
                                                            <strong>Total(belum termasuk ongkos kirim)</strong>
                                                            <input name="total" type="text" id="jumlah"  value="" style="width:100px"readonly>

                                                    </tr>
                                                     <tr>
                                                        <td colspan="9">
                                                            <strong>Berat total</strong>
                                                            <input name="total" type="text" id="total_berat"  value="" style="width:50px" readonly>gram
                                                            </td>
                                                        </tr>
                                                    <tr>
                                                        <td class="actions" colspan="9">
                                                            <!-- <input type="submit" value="Update Cart" name="update_cart" class="button" style="background:#66CC99"> -->
                                                            <button type="submit" class="add_to_cart_button" value="submit" style="background:#66CC99;text-transform: capitalize;height:35px;padding: 5px 5px;font-family:Raleway;font-size:15px; "> Update keranjang</button>
                                                            
                                                       </form>
                                        
                                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('checkout/2') }}">Checkout</a>
                                                        </td>

                                                    </tr>
                                                    
                                                       
                                                        <?php
                                                    }
                                                   ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        

                                      
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
            var  berat_total=0;
            @foreach ($data as $row)

            var satu = document.getElementById("nilai1{{$i}}").value; 
             console.log(satu);
            var dua = document.getElementById("nilai2{{$i}}").value; 
            console.log(dua);
             var tiga = document.getElementById("nilai3{{$i}}").value; 
             console.log(tiga);
             var berat = document.getElementById("berat{{$i}}").value; 
             console.log(berat);
             var beratto=document.getElementById("beratto{{$i}}").value=(parseInt(satu)* parseInt(berat));
             var hasil = document.getElementById("total{{$i}}").value=( parseInt(beratto)* parseInt(dua))+ parseInt(tiga);

             console.log(hasil);
             total=total+( parseInt(satu)* parseInt(dua))+ parseInt(tiga);
             document.getElementById("jumlah").value=total;
             console.log(total);
             berat_total=berat_total+( parseInt(berat)*parseInt(satu));
             document.getElementById("total_berat").value=berat_total;
             console.log(berat_total);
             @php
             $i++;
             
             @endphp
             @endforeach

        });
             
        
    </script>

    @endsection