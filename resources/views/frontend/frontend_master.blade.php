<!DOCTYPE HTML>
<html>
   <head>
      <title>
         @yield('title')
      </title>
      @include('frontend.partials.css')
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

      @include('frontend.partials.js')

   </body>
</html>
