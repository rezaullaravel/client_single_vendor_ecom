@extends('frontend.frontend_master')

@section('title')
User Dashboard
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
                        <div class="panel-body">
                            <div style="text-align: center;">
                                @if (Auth::user()->image)
                                  <img src="{{ asset(Auth::user()->image) }}" height="100" width="100" style="border-radius: 50%;" >
                                @else
                                  <img src="{{ asset('/') }}admin/dist/img/avatar5.png" height="100" width="100" style="border-radius: 50%;" >
                                @endif

                                <p style="margin-top: 5px; font-size:20px;">{{ Auth::user()->name }}</p>
                            </div>
                            @php
                                $user = Auth::user();
                            @endphp
                            <form action="{{ route('user.profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                    @error('name')
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Profile Pic</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" rows="5">{{ $user->address }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block"><b>Update</b></button>
                            </form>
                        </div>
                    </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
