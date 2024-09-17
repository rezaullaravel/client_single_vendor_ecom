@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h4>Edit Color
                        <a href="{{ route('admin.color.list') }}" class="btn btn-dark" style="float: right;">Back</a>
                    </h4>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.color.update',$color->id) }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Color Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $color->name }}" class="form-control"  placeholder="Enter color name">
                        @error('name')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Color Hex Code<span class="text-danger">*</span></label>
                        <input type="text" name="code" value="{{ $color->code }}" class="form-control"  placeholder="Enter color code">
                        @error('code')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
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
