@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h4>Order Details
                            <a href="{{ url('/admin/order/all') }}" class="btn btn-dark" style="float: right;">Back</a>
                        </h4>
                      </div>

                      <div class="card-body">
                        <table  class="table table-striped table-bordered table-sm" style="width:100%">
                            <tbody>

                                    <tr>
                                        <td width="180" class="text-center">Customer Name</td>
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
                                        <td class="text-center">Shipping Address</td>
                                        <td>{{ $order->c_shipping_address }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">Zip Code</td>
                                        <td>{{ $order->c_zipcode }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">Order Date</td>
                                        <td>{{ $order->date }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">Order Id No.</td>
                                        <td>{{ $order->order_id_no }}</td>
                                    </tr>


                                    <tr>
                                        <td class="text-center">Payment Type</td>
                                        <td>{{ $order->payment_type }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">Order Status</td>
                                        <td>
                                            @if ($order->status=='0')
                                              <span class="badge badge-danger">
                                                Pending

                                              </span>

                                            @elseif($order->status=='1')
                                            <span class="badge badge-success">
                                                Received

                                            </span>

                                            @elseif($order->status=='2')
                                               <span class="badge badge-primary">
                                                   Completed

                                               </span>
                                            @endif
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                      </div>
                   </div>
                {{-- data table end --}}
            </div>
        </div>{{-- end row --}}

        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-body">
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
                                @php
                                    $sum = 0;
                                @endphp
                                @foreach ($orderDetails as $detail)
                                    <tr class="text-center">
                                        <td>
                                            {{ $detail->product->name }}
                                        </td>

                                        <td>
                                            <img src="{{ asset($detail->product->thumbnail) }}" alt="" width="100">
                                        </td>

                                        <td>{{ $detail->product_quantity }}</td>
                                        <td>{{ $detail->product->selling_price }} TK.</td>
                                        <td>
                                            {{$detail->product->selling_price*
                                              $detail->product_quantity }} TK.
                                        </td>
                                        @php
                                            $sum = $sum + $detail->product->selling_price*
                                              $detail->product_quantity;
                                        @endphp
                                        <td>{{ $detail->color->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tr>
                                <td colspan="4"> <span style="float: right;">Sub Total</span></td>
                                <td colspan="2">
                                    {{ $sum }} Tk.
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4"> <span style="float: right;">Shipping Charge</span></td>
                                <td colspan="2">
                                    {{ $order->shipping_charge }} Tk.
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4"> <span style="float: right;">Coupon Discount</span></td>
                                <td colspan="2">
                                    @if (!empty($order->coupon_discount))
                                      {{ $order->coupon_discount }} Tk.
                                    @endif

                                </td>
                            </tr>

                            <tr>
                                <th colspan="4"> <span style="float: right;">Order Total</span></th>
                                <td colspan="2"  style="font-weight: 600;">
                                    {{$sum + $order->shipping_charge- $order->coupon_discount }} Tk.
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>{{-- end row --}}
    </div>
 </div>


@endsection
