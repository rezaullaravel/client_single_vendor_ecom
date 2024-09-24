@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Terms And Condition
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('terms.conditon.update',$data->id) }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Terms & Conditons <span class="text-danger">*</span></label>
                        <textarea  class="form-control" name="terms_conditions" rows="8">{{ $data->terms_conditions }}</textarea>
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
