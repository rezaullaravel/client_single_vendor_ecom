@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Returns & Refunds
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('returns.refunds.update',$data->id) }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Returns & Refunds <span class="text-danger">*</span></label>
                        <textarea  class="form-control" name="returns_refunds" rows="8">{{ $data->returns_refunds }}</textarea>
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
