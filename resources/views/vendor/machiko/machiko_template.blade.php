<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Machiko K-Store</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset("/vendor/machikoo/bootstrap-3.2.0/dist/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
     <link rel="stylesheet" href="{{asset("/vendor/machikoo/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" >
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset("vendor/machikoo/css/owl.carousel.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/machikoo/style.css")}}">
    
    <link rel="stylesheet" href="{{asset("vendor/machikoo/css/responsive.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/machikoo/css/dropdown.css")}}">

    <link rel="stylesheet" href="{{asset("imageUpload/dist/css/bootstrap-imageupload.min.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/machikoo/etalage.css")}}">    

    <!-- dropzone -->
    <link rel="stylesheet" href="{{asset("dropzone/dropzone.css")}}">
    <link href="{{asset("vendor/adminlite/plugins/fileinput/fileinput.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    
    
    @include('vendor.machiko.header')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            
       <!-- </section>-->

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            
            <!--  -->

            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    
    @include('vendor.machiko.footer')

   
    
   
    <!-- Latest jQuery form server -->
    <script src="{{asset("https://code.jquery.com/jquery.min.js")}}"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="{{asset("http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js")}}"></script>
    
    <!-- jQuery sticky menu -->
    <script src="{{asset("vendor/machikoo/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("vendor/machikoo/js/jquery.sticky.js")}}"></script>
    
    <!-- jQuery easing -->
    <script src="{{asset("vendor/machikoo/js/jquery.easing.1.3.min.js")}}"></script>
    
    <!-- Main Script -->
    <script src="{{asset("vendor/machikoo/js/main.js")}}"></script>

    <script src="{{asset("imageUpload/dist/js/bootstrap-imageupload.min.js")}}"></script>

    <!-- upload gambar -->
    <script src="{{asset("dropzone/dropzone.js")}}"></script>
    <script src="{{asset("vendor/adminlte/plugins/fileinput/fileinput.min.js")}}" type="text/javascript"></script>

     </script>
@yield('js')
        <!-- hover effek -->
            <script type="text/javascript">
        $( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});
    </script>
    <script type="text/javascript">
    var $imageupload = $('.imageupload');
    $imageupload.imageupload();
    </script>
  </body>
</html>