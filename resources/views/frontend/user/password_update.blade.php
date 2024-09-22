@extends('frontend.frontend_master')
@section('title')
Password Update
@endsection
@section('content')
<div class="content-top offer-w3agile">
   <div class="container" style="margin-top: 10px;">
      <div class="col-md-12">
         <div class="row">
            <div class="vertical-menu col-md-3">
               @include('frontend.user.partials.sidebar_menu')
            </div>
            <div class="col-md-9">
               <div class="panel panel-default">
                  <div class="panel-header">
                     <h4 class="text-center" style="margin-top: 10px;">Password Update</h4>
                  </div>
                  <div class="panel-body">
                     <form action="{{ route('user.password.update',$user->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                           <strong>Current Password <span class="text-danger">*</span> </strong>
                           <input type="password" name="current_password" class="form-control" placeholder="Enter Current Password" style="margin-top: 8px;">
                           @error('current_password')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <strong>New Password <span class="text-danger">*</span> </strong>
                           <input type="password" name="password" class="form-control  mt-2" placeholder="Enter New Password" style="margin-top: 8px;">
                           @error('password')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <strong>Confirm New Password <span class="text-danger">*</span> </strong>
                           <input type="password" name="password_confirmation" class="form-control  mt-2" placeholder="Enter  Password Confirmation" style="margin-top: 8px;">
                           @error('password_confirmation')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-4">Update</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
