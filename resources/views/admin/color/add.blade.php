@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Add Color
                        <a href="{{ route('admin.color.list') }}" class="btn btn-dark" style="float: right;">Back</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.color.store') }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Color Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="Enter color name">
                        @error('name')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Color Hex Code<span class="text-danger">*</span></label>
                        <input type="text" name="code" value="{{ old('code') }}" class="form-control"  placeholder="Enter color code">
                        @error('code')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
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
