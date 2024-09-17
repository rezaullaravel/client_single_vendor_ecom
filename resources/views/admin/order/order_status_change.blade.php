@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Edit Order Status
                        <a href="{{ url('/admin/order/all') }}" class="btn btn-dark" style="float: right;">Back</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.order-status.update') }}" method="POST">
                      @csrf

                      <input type="hidden" name="id" value="{{ $order->id }}">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Customer Name<span class="text-danger">*</span></label>
                        <input type="text"  value="{{ $order->user->name }}" disabled class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email<span class="text-danger">*</span></label>
                        <input type="text"  value="{{ $order->user->email }}" disabled class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Order Total<span class="text-danger">*</span></label>
                        <input type="text"  value="{{ $order->total }} TK." disabled class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Order Status</label>
                        <select name="status" class="form-control">
                            <option value="0" {{ $order->status=='0' ? 'selected':'' }}>Pending</option>

                            <option value="1" {{ $order->status=='1' ? 'selected':'' }}>Received</option>

                            <option value="2" {{ $order->status=='2' ? 'selected':'' }}>Completed</option>
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>
@endsection
