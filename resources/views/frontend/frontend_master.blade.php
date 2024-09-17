<!DOCTYPE HTML>
<html>
   <head>
      <title>
         @yield('title')
      </title>
      <!--css-->
      <link href="{{ asset('/') }}frontend/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="{{ asset('/') }}frontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link href="{{ asset('/') }}frontend/css/font-awesome.css" rel="stylesheet">
      <!--css-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
      {{-- <script src="{{ asset('/') }}frontend/js/jquery.min.js"></script> --}}
      <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>


      <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
      <link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
      <!--search jQuery-->
      <script src="{{ asset('/') }}frontend/js/main.js"></script>
      <!--search jQuery-->
      <script src="{{ asset('/') }}frontend/js/responsiveslides.min.js"></script>
      <script>
         $(function () {
           $("#slider").responsiveSlides({
           	auto: true,
           	nav: true,
           	speed: 500,
             namespace: "callbacks",
             pager: true,
           });
         });
      </script>
      <!--mycart-->
      <script type="text/javascript" src="{{ asset('/') }}frontend/js/bootstrap-3.1.1.min.js"></script>
      <!-- cart -->
      <script src="{{ asset('/') }}frontend/js/simpleCart.min.js"></script>
      <!-- cart -->
      {{-- css and js for product single page --}}
      <script defer src="{{ asset('/') }}frontend/js/jquery.flexslider.js"></script>
      <link rel="stylesheet" href="{{ asset('/') }}frontend/css/flexslider.css" type="text/css" media="screen" />
      <script src="{{ asset('/') }}frontend/js/imagezoom.js"></script>
      <script>
         // Can also be used with $(document).ready()
         $(window).load(function() {
           $('.flexslider').flexslider({
             animation: "slide",
             controlNav: "thumbnails"
           });
         });
      </script>
      {{-- css and js for product single page end --}}
      <!--start-rate-->
      <script src="js/jstarbox.js"></script>
      <link rel="stylesheet" href="{{ asset('/') }}frontend/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
      <script type="text/javascript">
         jQuery(function() {
         jQuery('.starbox').each(function() {
         	var starbox = jQuery(this);
         		starbox.starbox({
         		average: starbox.attr('data-start-value'),
         		changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
         		ghosting: starbox.hasClass('ghosting'),
         		autoUpdateAverage: starbox.hasClass('autoupdate'),
         		buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
         		stars: starbox.attr('data-star-count') || 5
         		}).bind('starbox-value-changed', function(event, value) {
         		if(starbox.hasClass('random')) {
         		var val = Math.random();
         		starbox.next().text(' '+val);
         		return val;
         		}
         	})
         });
         });
      </script>
      <!--//End-rate-->
      {{-- toastr notification --}}
      <link rel="stylesheet" type="text/css"
         href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      {{-- toastr notification end --}}

      {{-- line awesome cdn --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"/>
      {{-- line awesome cdn end --}}
   </head>
   <body>
      <!--header-->
      @include('frontend.partials.header')
      <!--header-->
      <!--content-->
      @yield('content')
      <!--content-->
      <!---footer--->
      @include('frontend.partials.footer')
      <!---footer--->
      {{-- toastr notification --}}
      <script>
         @if(Session::has('message'))
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.success("{{ session('message') }}");
         @endif

         @if(Session::has('error'))
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.error("{{ session('error') }}");
         @endif

         @if(Session::has('info'))
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.info("{{ session('info') }}");
         @endif

         @if(Session::has('warning'))
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.warning("{{ session('warning') }}");
         @endif
      </script>
      {{-- toastr notification end --}}
   </body>
</html>
