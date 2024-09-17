@extends('frontend.frontend_master')

@section('title')
Order Details
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
                        <h3 style="margin-top: 7px;">Order Details</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-center" width="150">Order Id</td>
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

        </div>

        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12"></div>
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                    <th>Color</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sum = 0; @endphp
                                @foreach ($order->orderDetails as $detail)
                                <tr class="text-center">
                                    <td>{{ $detail->product->name }}</td>
                                    <td><img src="{{ asset($detail->product->thumbnail) }}" alt="" class="img-responsive" width="100"></td>
                                    <td>{{ $detail->product_quantity }}</td>
                                    <td>{{ $detail->product->selling_price }} TK.</td>
                                    <td>{{ $detail->product->selling_price * $detail->product_quantity }} TK.</td>
                                    @php $sum += $detail->product->selling_price * $detail->product_quantity; @endphp
                                    <td>{{ $detail->color->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">Sub Total</td>
                                    <td colspan="2">{{ $sum }} TK.</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Shipping Charge</td>
                                    <td colspan="2">{{ $order->shipping_charge }} TK.</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Coupon Discount</td>
                                    <td colspan="2">{{ $order->coupon_discount ?? 0 }} TK.</td>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">Order Total</th>
                                    <td colspan="2" class="font-weight-bold">{{ $sum + $order->shipping_charge - $order->coupon_discount }} TK.</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>{{-- row --}}
    </div>
</div>
@endsection
