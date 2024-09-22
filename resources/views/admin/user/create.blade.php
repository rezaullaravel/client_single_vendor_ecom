@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Add User
                        <a href="{{ route('admin.user.index') }}" class="btn btn-dark" style="float: right;">Back</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="Enter user name">
                        @error('name')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"  placeholder="Enter user email">
                        @error('email')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" value="" class="form-control"  placeholder="Enter user password">
                        @error('password')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"  placeholder="Enter user phone number">
                        @error('phone')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Photo<span class="text-danger"></span></label>
                        <input type="file" name="image"  class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Address<span class="text-danger"></span></label>
                        <textarea name="address"  class="form-control" rows="5" placeholder="Enter user address"></textarea>
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
