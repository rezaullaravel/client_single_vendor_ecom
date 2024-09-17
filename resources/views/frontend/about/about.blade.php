@extends('frontend.frontend_master')
@section('title')
About Us
@endsection

@section('content')
<!--about-->
<div class="container" style="margin-top: 20px;">
   <div class="row">
     <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-header">
                <h3 class="text-center" style="margin-top: 12px;">About Us.</h3>
            </div>
            <div class="panel-body">
                @php
                          $aboutus = App\Models\AboutUs::first();
                @endphp
                <img class="img-responsive" src="{{ asset($aboutus->image) }}" alt="" style="float: left; width:400px; height:400px; padding:14px;">

                <p style="text-align:justify; margin-top:7px;">{{ $aboutus->description }}</p>
            </div>
        </div>
     </div>
   </div>
</div>
<!--//about-->
@endsection
