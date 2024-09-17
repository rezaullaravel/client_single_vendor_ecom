@extends('frontend.frontend_master')

@section('title')
My Order
@endsection

@section('content')
<div class="content-top offer-w3agile">
    <div class="container" style="margin-top: 10px;">
        <div class="row">

            <div class="col-md-3 col-sm-4 col-xs-12">
                @include('frontend.user.partials.sidebar_menu')
            </div>

            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 style="margin-top: 7px;">My Order List</h3>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th>Sl.</th>
                                    <th>Order Id</th>
                                    <th>Order Total</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($myOrders as $key => $row)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->order_id_no }}</td>
                                        <td>{{ $row->total }} TK.</td>
                                        <td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
                                        <td>
                                            @if ($row->status == '0')
                                                <span class="label label-danger">Pending</span>
                                            @elseif($row->status == '1')
                                                <span class="label label-success">Received</span>
                                            @elseif($row->status == '2')
                                                <span class="label label-primary">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('my-order-details', $row->id) }}" class="btn btn-success btn-sm" title="Order details">
                                                <i class="las la-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
