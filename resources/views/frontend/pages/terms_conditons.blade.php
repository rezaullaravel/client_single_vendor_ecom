@extends('frontend.frontend_master')

@section('title')
Terms condition Page
@endsection


@section('content')
<div class="content">
    <div class="container ">
        <div class="panel-group" id="faqAccordion">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h1 class="text-center" style="margin:10px 0">Terms & condition</h1>
                </div>
             {{-- dynamic content start --}}
                <div class="panel-body">
                    <p>{{ $data->terms_conditions }}</p>
                </div>
             {{-- dynamic content end --}}
            </div>
        </div>
        <!--/panel-group-->
    </div>
</div>
@endsection
