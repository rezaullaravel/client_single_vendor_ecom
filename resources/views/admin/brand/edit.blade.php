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
                    <h3>Edit Brand
                        <a href="{{ url('/admin/brand/manage') }}" class="btn btn-dark" style="float: right">Back</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.brand.update') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $brand->id }}">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Brand Name<span class="text-danger">*</span></label>
                        <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control"  placeholder="Enter brand name">
                        @error('brand_name')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Brand Logo</label>
                        <input type="file"  class="dropify" name="brand_logo" class="form-control">
                        @if ($brand->brand_logo)
                        <img src="{{ asset($brand->brand_logo) }}" alt=""  style="margin-top: 8px;" width="200" height="140">
                        @else
                            <p>No image found...</p>
                        @endif

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

<script>
    $('.dropify').dropify();
</script>
@endsection
