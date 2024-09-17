@extends('admin.admin_master')
@section('content')
<link rel="stylesheet" href="{{ asset('admin/dropify/dropify.css') }}">
<script src="{{ asset('admin/dropify/dropify.js') }}"></script>

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Brand</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name<span class="text-danger">*</span></label>
                        <input type="text" name="brand_name" class="form-control"  placeholder="Enter brand name">
                        @error('brand_name')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Brand Logo</label>
                        <input type="file"  class="dropify" name="brand_logo" class="form-control">

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

<script>
    $('.dropify').dropify();
</script>
@endsection
