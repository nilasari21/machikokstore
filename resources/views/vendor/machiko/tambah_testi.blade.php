@extends('vendor.machiko.machiko_template')


@section('content')
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
           
            <div class="col-md-9 padding-right" style="width:100%">
        <div class="product-details"><!--product-details-->
        
 
    <div class="col-sm-12 simpleCart_shelfItem anotherCart_shelfItem">
        <div class="product-information"> 
          <h1 class="item_name" style="font-family:Roboto">Kirim Testimoni</h1>
          <br/><br/>
      <form method="POST"  enctype="multipart/form-data" files="true" action="{{ url('testimoni/simpan') }}">
        <div class="row">
            {{ csrf_field() }}
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputFile">Upload gambar</label>
                <input id="input-2" type="file" name='file' multiple=true class="file-loading" data-show-upload="false"><br/>
            <!-- <div class="imageupload">
              <div class="file-tab">
                <label style="padding:6px 12px; font-size:12px" class="btn btn-default btn-file">
                  <span>Upload</span>
                  The file is stored here.
                  <input type="file" name="image">                        
                </label>
                <button type="button" class="btn btn-default" style="padding:6px 12px; font-size:12px">Hapus</button>
                 @if ($errors->has('bukti')) <p class="help-block">{{ $errors->first('bukti') }}</p> @endif
              </div>
            </div> -->
         </div>
                <div class="form-group">
                    Testimoni Produk
                    
                     <textarea id="editor1" name="keterangan" rows="10" cols="30" style="border: 1px solid #DF5E96;">
                    </textarea>
                </div>
                <button type="submit" class="add_to_wishlist">Kirim testimoni</button>
                 </div>

            </div>
        </div>
       
     </form>  
</div><!--/product-information-->
</div>
</div><!--/product-details-->


    

</div>

            
            @endsection
              @section('js')
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