@extends('frontend.frontend_master')

@section('title')
Privacy & Policy Page
@endsection


@section('content')
<div class="content">
    <div class="container ">
        <div class="panel-group" id="faqAccordion">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h1 class="text-center" style="margin:10px 0">Privacy & Policy</h1>
                </div>
             {{-- dynamic content start --}}
                <div class="panel-body">
                    <p>{{ $data->policy }}</p>
                </div>
             {{-- dynamic content end --}}
            </div>
        </div>
        <!--/panel-group-->
    </div>
</div>
@endsection
