@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
    <div class="zigzag-bottom">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <a class="add_to_cart_button" onClick="a()" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="#">Buat Testimoni</a>
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
                        if(count($row->foto_testi)==0){?>
                        
                        <?php
                        }else{?> 
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
            <div class="modal fade" id="modal3" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Kirim Testimoni</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"  enctype="multipart/form-data" files="true" action="{{ url('testimoni/simpan') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload gambar</label>
                                                <input id="input-2" type="file" name='image' multiple=true class="file-loading" data-show-upload="false">
                                            </div>
                                              <div class="form-group">
                                                  <label for="exampleInputFile">Testimoni produk</label><br/>
                    
                     <textarea id="editor1" name="keterangan" rows="10"  style="border: 1px solid #DF5E96;width:100%">
                    </textarea>
                </div>
                
                 </div>

            </div>
       
       
      

                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="add_to_wishlist btn-lg" style="text-transform:capitalize;padding: 8px 20px;">Kirim testimoni</button>
                                       <button   class="add_to_wishlist btn" style="text-transform:capitalize" data-dismiss="modal">Batal</button>
                                      </form> 
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>


            
   
@endsection
 @section('js')
    <script type="text/javascript">
    function a(){
                
      
        $('#modal3').modal('show');
        
      
    }
             
        
    </script>
<script type="text/javascript">
              Dropzone.options.myAwesomeDropzone = {
              paramName: "image", // The name that will be used to transfer the file
              maxFilesize: 2, // MB
              accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                  done("Naha, you don't.");
                }
                else { done(); }
              }
            };
            // var myDropzone = new Dropzone("div#myId", { url: "/file/post"});
              </script>
              <script type="text/javascript">
              $("#input-2").fileinput({
                uploadUrl: "",
                uploadAsync: true,
                minFileCount: 1,
                maxFileCount: 5,
                allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
                uploadExtraData: function() {  // callback example
                    var out = {_token: "{{ csrf_token() }}"};
                    return out;
                }
            });
              </script>
    @endsection