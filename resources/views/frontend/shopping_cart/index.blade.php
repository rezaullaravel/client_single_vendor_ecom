@extends('frontend.frontend_master')

@section('title')
Shopping Cart
@endsection

@section('content')

<style>
   .qtystyle{
      width: 27px;
      text-align: center;
   }

   @media (max-width: 767px) {
       .qtystyle {
           width: 100%;
       }
       .input-group-text {
           width: 100%;
           text-align: center;
       }
       .panel-heading h4 {
           font-size: 18px;
           text-align: center;
       }
       .table-responsive {
           margin-bottom: 15px;
       }
       .btn {
           display: block;
           width: 100%;
           margin-bottom: 5px;
       }
   }
</style>

<!-- contact -->
<div class="container" style="margin-top:12px;">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Shopping Cart</h4>
            </div>

            <div class="panel-body">
                @if(Auth::check())

                @php
                    $cart_products = App\Models\ShoppingCart::where('user_id', Auth::user()->id)->get();
                    $total = 0;
                @endphp

                @if(count($cart_products) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered cartTable">
                        <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>Product</th>
                                <th>Thumbnail</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Color</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_products as $key => $product)
                            @php
                                $main_product = App\Models\Product::with('colors')->where('id', $product->product_id)->first();
                            @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->product->name }}</td>
                                <td><img src="{{ asset($product->product->thumbnail) }}" alt="" width="80" height="80"></td>
                                <td>{{ $product->product->selling_price * $product->quantity }} TK.</td>
                                <td>
                                    <div class="input-group quantity">
                                        @if ($product->quantity > 1)
                                        <button class="input-group-text qtyDecrement" data-id="{{ $product->id }}">-</button>
                                        @else
                                        <button class="input-group-text">-</button>
                                        @endif
                                        <input type="text" class="qty-input qtystyle" value="{{ $product->quantity }}">
                                        <button class="input-group-text qtyIncrement" data-id="{{ $product->id }}">+</button>
                                    </div>
                                </td>
                                <td>
                                    <select name="color_id" class="form-control color_id" required data-id="{{ $product->id }}">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($main_product->colors as $color)
                                        <option value="{{ $color->id }}" {{ $color->id == $product->color_id ? 'selected' : '' }}>{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <a href="{{ url('cart-item/delete', $product->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" title="Remove"><i class="las la-trash"></i></a>
                                </td>
                            </tr>
                            @php
                            $total += $product->product->selling_price * $product->quantity;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="3"><strong>Total Price</strong></td>
                                <td><strong>{{ $total }} TK.</strong></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @else
                <h4 class="text-danger text-center">Your shopping cart is empty</h4>
                @endif

                @if (count($cart_products) > 0)
                <div class="card-sample">
                    <div class="text-right" style="float: right;">
                        <a href="{{ url('/cart/empty') }}" class="btn btn-info">Empty Cart</a>
                        <a href="{{ url('/checkout') }}" class="btn btn-danger">Checkout</a>
                    </div>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // Quantity Increment
        $(document).delegate('.qtyIncrement', 'click', function() {
            var rowId = $(this).data('id');
            var data = {
                _token: '{{csrf_token()}}',
                'rowId': rowId,
            };

            $.ajax({
                url: '/quantity/increment',
                type: 'POST',
                data: data,
                success: function(response) {
                    $('.table').load(location.href + ' .table');
                },
            });
        });

        // Quantity Decrement
        $(document).delegate('.qtyDecrement', 'click', function() {
            var rowId = $(this).data('id');
            var data = {
                _token: '{{csrf_token()}}',
                'rowId': rowId,
            };

            $.ajax({
                url: '/quantity/decrement',
                type: 'POST',
                data: data,
                success: function(response) {
                    $('.table').load(location.href + ' .table');
                },
            });
        });

        // Change product color
        $(document).delegate('.color_id', 'change', function() {
            var rowId = $(this).data('id');
            var color_id = $(this).val();
            var data = {
                _token: '{{csrf_token()}}',
                'rowId': rowId,
                'color_id': color_id,
            };

            $.ajax({
                url: '/cart-color/update',
                type: 'POST',
                data: data,
                success: function(response) {
                    $('.table').load(location.href + ' .table');
                }
            });
        });
    });
</script>
