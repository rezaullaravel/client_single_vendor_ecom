<style>
    body {
    font-family: 'Arial', sans-serif;
    }
    .table {
    width: 100%;
    border-collapse: collapse;
    }
    .table, .table th, .table td {
    border: 1px solid black;
    }
    .table th, .table td {
    padding: 8px;
    text-align: left;
    }
    /* Add CSS for inline sections */
    .invoice-info-inline {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    }
    .invoice-info-inline .invoice-col {
    width: 30%; /* Ensure 3 columns fit side by side */
    box-sizing: border-box; /* Ensures padding doesn’t affect width */
    }
 </style>
 <section class="content">
    <div class="container-fluid">
       <div class="row">
          <div class="col-12">
             <!-- Main content -->
             <div class="invoice p-3 mb-3">
                <!-- Title row -->
                <div class="row">
                   <div class="col-12">
                      <h4>
                         <small class="float-right">Date: {{ date('d-m-Y') }}</small>
                      </h4>
                   </div>
                </div>
                <!-- Info row - inline sections for From, To, and Invoice Details -->
                <div class="row invoice-info-inline">
                   <table width="100%">
                      <tr>
                         <td>
                            <!-- From Section -->
                            <div class="invoice-col">
                               <strong>From:</strong> <br>
                               <address>
                                  <strong>Admin.</strong><br>
                                  795 Folsom Ave, Suite 600<br>
                                  San Francisco, CA 94107<br>
                                  Phone: (804) 123-5432<br>
                                  Email: info@demo.com
                               </address>
                            </div>
                         </td>
                         <td>
                            <!-- To Section -->
                            <div class="invoice-col">
                               <strong>To:</strong> <br>
                               <address>
                                  <strong>{{ $order->user->name }}</strong><br>
                                  {{ $order->c_shipping_address }}<br>
                                  Phone: {{ $order->c_phone }}<br>
                                  Email: {{ $order->user->email }}
                               </address>
                            </div>
                         </td>
                         <td>
                            <!-- Invoice Details Section -->
                            <div class="invoice-col">
                               <strong>Invoice Details:</strong><br>
                               <b>Order ID:</b> {{ $order->order_id_no }}<br>
                               <b>Order Date:</b> {{ date('d-m-Y',strtotime($order->date)) }}<br>
                               <b>Payment Type:</b> {{ $order->payment_type }}
                            </div>
                         </td>
                      </tr>
                   </table>
                </div> <br> <br>
                <!-- Table row for product details -->
                <div class="row">
                   <div class="col-12 table-responsive">
                      <table class="table table-striped">
                         <thead>
                            <tr>
                               <th>Product</th>
                               <th>Qty</th>
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
                               <td>{{ $detail->product_quantity }}</td>
                               <td>{{ $detail->product->selling_price }} TK.</td>
                               <td>{{ $detail->product->selling_price * $detail->product_quantity }} TK.</td>
                               @php $sum += $detail->product->selling_price * $detail->product_quantity; @endphp
                               <td>{{ $detail->color->name }}</td>
                            </tr>
                            @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
                <div class="row">
                   <div class="col-6">
                      <p class="lead"></p>
                   </div>
                   <div class="col-6">
                      <div class="table-responsive">
                         <table class="table">
                            <tr>
                               <th style="width:50%">Subtotal:</th>
                               <td>{{ $sum }} TK.</td>
                            </tr>
                            <tr>
                               <th>Coupon Discount</th>
                               <td>{{ $order->coupon_discount ?? 0 }} TK.</td>
                            </tr>
                            <tr>
                               <th>Shipping:</th>
                               <td>{{ $order->shipping_charge }} TK.</td>
                            </tr>
                            <tr>
                               <th>Total:</th>
                               <td>{{ $sum + $order->shipping_charge - $order->coupon_discount }} TK.</td>
                            </tr>
                         </table>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
