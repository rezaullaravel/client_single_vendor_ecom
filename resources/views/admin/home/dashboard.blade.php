@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
                @php
                    $orders = App\Models\Order::all();
                @endphp
              <h3>{{ count($orders) }}</h3>

              <p>Total Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.order.all') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
                @php
                    $products = App\Models\Product::all();
                @endphp
              <h3>{{ count($products) }}</h3>

              <p>Total Product</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('admin/product/manage') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
                @php
                    $users = App\Models\User::all();
                @endphp
              <h3>{{ count($users) }}</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
                @php
                    $reviews = App\Models\Review::all();
                @endphp
              <h3>{{ count($reviews) }}</h3>

              <p>Total Review</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('admin.review.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!--row-->
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Order</h4>
                </div>

                <div class="card-body">
                    @php
                        $orders = App\Models\Order::orderBy('id','desc')->limit(10)->get();
                    @endphp
                    <table class="table table-striped table-bordered table-sm" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">Sl no.</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Order Total</th>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($orders as $key=>$row)
                              <tr class="text-center">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->c_phone }}</td>
                                <td>{{ $row->user->email }}</td>
                                <td>{{ $row->total }} TK.</td>
                                <td>{{ $row->order_id_no }} </td>
                                <td>{{ date('d-m-Y',strtotime($row->date)) }} </td>
                                <td>
                                     @if ( $row->status=='0')
                                        <span class="badge badge-danger">Pending</span>
                                     @endif

                                     @if ( $row->status=='1')
                                        <span class="badge badge-primary">Received</span>
                                     @endif

                                     @if ( $row->status=='2')
                                        <span class="badge badge-success">Completed</span>
                                     @endif
                                </td>
                              </tr>

                           @endforeach
                        </tbody>
                    </table>

                    <div class="text-right mt-3">
                        <a href="{{ route('admin.order.all') }}" class="small-box-footer btn btn-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!--row-->
    </div><!-- /.container-fluid -->
  </section>

@endsection
