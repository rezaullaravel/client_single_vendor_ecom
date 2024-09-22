@extends('admin.admin_master')

@section('content')
<section class="container-fluid">
    <div class="row">
      <div class="col-sm-8 offset-sm-2">
         <div class="card">
             <div class="card-header">
                 <h5 style="display: inline;">Change Password</h5>
             </div>

             <div class="card-body">
                 <form action="{{ route('admin.setting.password.update',$admin->id) }}" method="post">
                     @csrf

                     <div class="row mt-4">
                         <div class="col-sm-12">
                             <div class="form-group">
                                 <strong>Current Password <span class="text-danger">*</span> </strong>
                                 <input type="password" name="current_password" class="form-control form-control-sm mt-2" placeholder="Enter Current Password">

                                 @error('current_password')
                                   <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                          </div>

                     </div>{{-- row --}}


                     <div class="row mt-4">
                         <div class="col-sm-12">
                             <div class="form-group">
                                 <strong>New Password <span class="text-danger">*</span> </strong>
                                 <input type="password" name="password" class="form-control form-control-sm mt-2" placeholder="Enter New Password">

                                 @error('password')
                                   <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                          </div>

                     </div>{{-- row --}}


                     <div class="row mt-4">
                         <div class="col-sm-12">
                             <div class="form-group">
                                 <strong>Confirm New Password <span class="text-danger">*</span> </strong>
                                 <input type="password" name="password_confirmation" class="form-control form-control-sm mt-2" placeholder="Enter  Password Confirmation">
                                 @error('password_confirmation')
                                 <p class="text-danger">{{ $message }}</p>
                               @enderror
                             </div>
                          </div>

                     </div>{{-- row --}}

                     <button type="submit" class="btn btn-primary btn-sm mt-4">Update</button>
                 </form>
             </div>
           </div>
      </div>
    </div>{{-- row --}}
 </section>
@endsection
