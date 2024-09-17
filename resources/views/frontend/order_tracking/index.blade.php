@extends('frontend.frontend_master')

@section('title')
Order Tracking
@endsection


@section('content')
<div class="content">

    <!--new-arrivals-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"></div>

                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            @if (session('error-message'))
                                <div class="alert alert-danger">
                                    <h4>{{ Session::get('error-message') }}</h4>
                                </div>
                            @endif

                            <div class="panel-header" style="margin-top:10px;">
                                <h4>Order Tracking</h4>
                            </div>

                            <div class="panel-body">
                                <form action="{{ route('fetch.order') }}" method="GET">
                                    <div class="form-group">
                                        <input type="text" name="order_id_no" class="form-control" placeholder="Enter order id no">
                                        @error('order_id_no')
                                           <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-success" style="float: right;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4"></div>
                </div>
            </div>
        </div>
    <!--new-arrivals-->

</div>
@endsection
