@extends('vendor.machiko.machiko_template')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
@endsection
@section('content')
<div class="single-product-area">
    <div class="zigzag-bottom">
    </div>
    <div class="container">
    <div class="col-sm-10" style="padding-left:20%">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px;background:#66CC99;font-family:Raleway"><b>Hasil Ongkos Kirim</b></div>
                <div class="panel-body">
                <!--  -->
                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('cekongkir') }}">Kembali</a>
                <div class="row" style="margin-top:15px">
                
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @foreach($hasil as $cek)
          @if(count($cek['costs']) > 0)
          @foreach($cek['costs'] as $cost)
          <div class="panel panel-default">
              <div class="panel-body">
                  {{$cek['name'].' - '.$cost['service'].' / '.$cost['description']}}
                  <div class="radio">
                      <label>
                         
                          {{$cost['cost'][0]['value']}}
                      </label>
                  </div>
              </div>
          </div>
          @endforeach
          @else
          <div class="panel panel-default">
              <div class="panel-body">
                  Tarif Pengiriman Tidak diketemukan.
              </div>
          </div>
          @endif
          @endforeach
                      
  </div>

</div>
<!-- </body> -->
@endsection

@section('js')

<script src="{{asset("vendor/machikoo/js/jquery.autocomplete.min.js")}}"></script>
<script>
var dataCities = [
     @foreach($data as $datas)
      {"value": "{{ $datas['city_name']}}", "data": "{{ $datas['city_id']}}"}, 
        @endforeach
]
$(document).ready(function () {
$('#autocomplete').autocomplete({
    lookup: dataCities,
    onSelect: function (suggestion) {
        $("input[name=kota_asal]").val(suggestion.data);
    }
});
});

$(document).ready(function () {
$('#autocomplete2').autocomplete({
    lookup: dataCities,
    onSelect: function (suggestion) {
        $("input[name=kota_tujuan]").val(suggestion.data);
    }
});
});
</script>

 <script type="text/javascript">
    function a(){
      var option=document.getElementById('pesan').value;
      var level=document.getElementById('level').value;
      if(option!="Customer"){
        $('#modal').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }else{
        $('#modal').modal('hide');
      }
    }
             
        
    </script>
<script type="text/javascript">
function getOngkir() {
      event.preventDefault();

      var kota_asal = $('#kota').val();
      var kota_tujuan = $('#kota_tujuan').val();
      // var radio = $('input[name=optionsRadio]:checked', '.radio').val();
      var service, des, etd, value;
       $.get("kurir/"+kota_tujuan+"/"+'jne',
        function(hasil){
            $('#ongkos').empty();
            $.each(hasil, function(index, hasil){
              console.log(hasil.costs.length);
              if(hasil.costs.length == 0){
                $('#ongkos').append('<p>Pengiriman dari Yogyakarta Tidak Tersedia</p>')
              }else{
                $.each(hasil.costs, function(index, hasil){
                  service = hasil.service;
                  des = hasil.description;
                  $.each(hasil.cost, function(index, hasil){
                    console.log(service);
                    $('#ongkos').append(
                    '<tr><td><input type="radio" name="ongkir" value="'+hasil.value+'" class="ongkir"></td>'+
                    '<td style="color:#000">'+service+' '+'</td>'+
                    '<td>'+des+'</td>'+
                    '<td>'+hasil.etd+'</td>'+
                    '<td>'+formatNumber(hasil.value)+'</td></tr>'
                    );
                  }); 
                }); 
              }
            }); 
            
        });
    };
</script>
  
@endsection
