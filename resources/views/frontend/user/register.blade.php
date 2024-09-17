@extends('frontend.frontend_master')
@section('title')
User Registration
@endsection
@section('content')
<div class="login">
   <div class="main-agileits">
      <div class="form-w3agile">
         <h3>User Registration</h3>
         <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
               <label>{{ __('Name') }}</label>
               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
               @error('name')
               <span class="invalid-feedback" role="alert">
               <strong class="text-danger">{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label>{{ __('Email Address') }}</label>
               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
               @error('email')
               <span class="invalid-feedback" role="alert">
               <strong class="text-danger">{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label>{{ __('Password') }}</label>
               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
               @error('password')
               <span class="invalid-feedback" role="alert">
               <strong class="text-danger">{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label>{{ __('Confirm Password') }}</label>
               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <input type="submit" value="Register">
         </form>
      </div>
      <div class="forg">
         <p>Already have an account? Please login <a href="{{ url('/login') }}" class="text-danger">here</a>.</p>
      </div>
   </div>
</div>
@endsection
