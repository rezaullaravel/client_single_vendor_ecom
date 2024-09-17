@extends('frontend.frontend_master')

@section('title')
Order Show
@endsection


@section('content')
<div class="content">

    <!--new-arrivals-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>

                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <h3 style="margin-top: 7px;">Order Info</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" width="150">Customer Name</td>
                                            <td>{{ $order->user->name }}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">Phone</td>
                                            <td>{{ $order->c_phone }}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">Email</td>
                                            <td>{{ $order->user->email }}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">Order Id</td>
                                            <td>{{ $order->order_id_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Order Total</td>
                                            <td>{{ $order->total }} TK.</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Payment Type</td>
                                            <td>{{ $order->payment_type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Order Date</td>
                                            <td>{{ date('d-m-Y', strtotime($order->date)) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Order Status</td>
                                            <td>
                                                @if ($order->status == '0')
                                                    <span class="label label-danger">Pending</span>
                                                @elseif($order->status == '1')
                                                    <span class="label label-success">Received</span>
                                                @elseif($order->status == '2')
                                                    <span class="label label-primary">Completed</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2"></div>
                </div>{{-- row --}}
            </div>
        </div>
    <!--new-arrivals-->

</div>
@endsection
