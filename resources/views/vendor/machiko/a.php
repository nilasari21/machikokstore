<script type="text/javascript">
           function displayForm(c){
            
            if (c.value=="option1"){
                jQuery('#ukuran').hide();
                jQuery('#buttonukuran').hide();  
                jQuery('#buttonnonukuran').toggle('show'); 
                

            }
            if (c.value=="option2"){
                jQuery('#ukuran').toggle('show');
                jQuery('#buttonukuran').toggle('show');
                jQuery('#buttonnonukuran').hide();
                 
            }
           };

       </script>
       <script type="text/javascript">
        $(function(){
          $('#buttonnonukuran').click(function(){
            $(this).closest("form").attr('action','{{ url('admin/readystock/simpannonukuran') }}')
          });
        });
       </script>
       <script type="text/javascript">
        $(function(){
          $('#buttonukuran').click(function(){
            $(this).closest("form").attr('action','{{ url('admin/readystock/simpanukuran') }}')
          });
        });
       </script>
       <script>
      $(function () {
       $('#tanggal').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3d'
        })
         });
        </script>
        <script>
      $(function () {
       $('#tanggal2').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3d'
        })
         });
        </script>
        <script>
      $(function () {
       $('#tanggal3').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3d'
        })
         });
        </script>
/*$id_prod[] = [$produk->id];
      $a[]=['ukuran_id'=>$request->id];
      $b[]=['stock'=>$request->stock_];
      $c[]=['harga_tambah'=>$request->harga_tambah];*/
      /*$produkUkuran= new ProdukUkuran($id_prod,$a,$b,$c);
      $produk->produk_ukuran()->save($id_prod,$a,$b,$c);*/
      /*$produkUkuran=$a;
      $produkUkuran=$b;
      $produkUkuran=$c;
      $produkUkuran=$id_prod;
      $Ukuran= new ProdukUkuran($produkUkuran);
      $Ukuran->save();*/

      /*$i=1;
      foreach ($ukuran as $key ) {
          # code...
        $produkUkuran= new ProdukUkuran;
        $produkUkuran->stock=$stock_[$i];
        $produkUkuran->ukuran=$key[$i];
        $produkUkuran->harga_tambah=$harga_tambah[$i];
        $produk->produk_ukuran()->save($produkUkuran);
        $i++;
      }*/
      /*$product = Produk::find(1);
      // if you need also to save the image
      // $image = new Ukuran(array('foo' => 'bar'));
      $product->ukuran()->save($image,array('stock'=>'foo', 'harga_tambah'=>'bar' ));
      // if you know image id
      $product->ukuran()->attach([$request->id => ['stock'=>'foo', 'harga_tambah'=>'bar']]);*/
<div class="row">
  <div class="col-sm-6">
    <div class="dataTables_length" id="data_length">
      <label>Tampilkan 
        <select name="data_length" aria-controls="data" class="form-control input-sm">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="-1">All</option>
        </select> data</label>
      </div>
    </div>
    <div class="col-sm-6">
      <div id="data_filter" class="dataTables_filter">
        <label>cari<input type="search" class="form-control input-sm" placeholder="" aria-controls="data"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-5">
      <div class="dataTables_info" id="data_info" role="status" aria-live="polite">Menampilkan 1 sampai 5 dari 126 data</div>
    </div>
    <div class="col-sm-7">
      <div class="dataTables_paginate paging_simple_numbers" id="data_paginate">
        <ul class="pagination">
          <li class="paginate_button previous disabled" id="data_previous">
            <a href="#" aria-controls="data" data-dt-idx="0" tabindex="0">sebelum</a>
          </li>
          <li class="paginate_button active">
            <a href="#" aria-controls="data" data-dt-idx="1" tabindex="0">1</a>
          </li>
          <li class="paginate_button "><a href="#" aria-controls="data" data-dt-idx="2" tabindex="0">2</a>
          </li>
          <li class="paginate_button "><a href="#" aria-controls="data" data-dt-idx="3" tabindex="0">3</a>
          </li>
          <li class="paginate_button "><a href="#" aria-controls="data" data-dt-idx="4" tabindex="0">4</a>
          </li>
          <li class="paginate_button "><a href="#" aria-controls="data" data-dt-idx="5" tabindex="0">5</a>
          </li>
          <li class="paginate_button disabled" id="data_ellipsis">
            <a href="#" aria-controls="data" data-dt-idx="6" tabindex="0">…</a>
          </li>
          <li class="paginate_button "><a href="#" aria-controls="data" data-dt-idx="7" tabindex="0">26</a>
          </li>
          <li class="paginate_button next" id="data_next">
            <a href="#" aria-controls="data" data-dt-idx="8" tabindex="0">selanjutnya</a>
          </li>
        </ul>
      </div>
    </div>
  </div>