@extends('frontend.frontend_master')

@section('title')
User Dashboard
@endsection

@section('content')
<div class="content-top offer-w3agile">
    <div class="container" style="margin-top: 10px;">
       <div class="col-md-12">
          <div class="row">

                <div class="vertical-menu col-md-3">
                  @include('frontend.user.partials.sidebar_menu')
                </div>

                <div class="col-md-9" style="background: #eee;">
                    <h4>Hello! {{ Auth::user()->name }}. Welcome to your dashboard.....</h4>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
