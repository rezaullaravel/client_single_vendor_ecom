@extends('admin.admin_master')

@section('content')
<div class="col-md-8 offset-md-2">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
            @if (Auth::guard('admin')->user()->image)
             <img class="profile-user-img img-fluid img-circle" src="{{ asset($admin->image) }}" alt="User profile picture">
            @else
             <img class="profile-user-img img-fluid img-circle" src="{{ asset('/') }}admin/dist/img/avatar5.png" alt="User profile picture">
            @endif

        </div>

        <h3 class="profile-username text-center">{{ $admin->name }}</h3>

        <form action="{{ route('admin.setting.profile.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <div class="form-group">
                      <label for="">Name <span class="text-danger">*</span> </label>
                      <input type="text" name="name" value="{{ $admin->name }}" class="form-control">
                      @error('name')
                         <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                </li>

                <li class="list-group-item">
                    <div class="form-group">
                        <label for="">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ $admin->email }}" class="form-control">
                        @error('email')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </li>

                  <li class="list-group-item">
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" value="{{ $admin->phone }}" class="form-control">
                    </div>
                  </li>

                  <li class="list-group-item">
                    <div class="form-group">
                        <label for="">Profile Pic</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                  </li>
              </ul>

              <button type="submit" class="btn btn-primary btn-block"><b>Update</b></button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection
