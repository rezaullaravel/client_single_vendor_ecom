@extends('admin.admin_master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3><b>Add Coupon</b>
                        <a href="{{ url('/admin/coupon') }}" class="btn btn-dark" style="float: right"><b>Back</b></a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ url('/admin/coupon/store') }}" method="POST">
                      @csrf
                    <div class="card-body">
                        <div class="form-group">
                                <label>Coupon code</label>
                                <input type="text" name="coupon_code" class="form-control"  placeholder="Enter coupon code">

                                @error('coupon_code')
                                <span class="text-danger">{{ $message }}</span>

                               @enderror
                        </div>

                        <div class="form-group">
                            <label>Coupon 	type</label>
                            <select name="type" id="" class="form-control">
                                <option value="" selected disabled>Select</option>
                                <option value="1">Fixed</option>
                                <option value="2">Percentage</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Amount<span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control"  placeholder="Enter coupon amount">

                            @error('amount')
                             <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="" selected disabled>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Valid date</label>
                            <input type="date" name="valid_date" class="form-control"  placeholder="Enter valid date">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>
@endsection
