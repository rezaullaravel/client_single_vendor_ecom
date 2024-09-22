@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Edit User
                        <a href="{{ route('admin.user.index') }}" class="btn btn-dark" style="float: right;">Back</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control"  placeholder="Enter user name">
                        @error('name')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control"  readonly>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Password<span class="text-danger">*</span></label>
                        <input type="text" name="password" value="" class="form-control"  placeholder="Enter user password">
                        <p class="text-danger">If you want to change password,please enter new password...</p>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"  placeholder="Enter user phone number">
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
                        <textarea name="address"  class="form-control" rows="5">{{ $user->address }}</textarea>
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
