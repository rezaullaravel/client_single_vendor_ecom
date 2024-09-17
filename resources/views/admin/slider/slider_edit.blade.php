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
                    <h3 class="card-title">Edit Slider</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.slider.update') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $slider->id }}">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Slider Title<span class="text-danger"></span></label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control"  placeholder="Enter slider title">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slider Image<span class="text-danger">*</span></label>
                        <input type="file"  class="dropify" name="image" class="form-control">

                        <p class="text-danger">If you want to change image, upload new image....</p>

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
