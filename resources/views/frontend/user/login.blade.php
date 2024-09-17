@extends('frontend.frontend_master')
@section('title')
User Login
@endsection
@section('content')
<div class="login">
   <div class="main-agileits">
      <div class="form-w3agile">
         <h3>User Login </h3>
         <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
               <label for="email">{{ __('Email Address') }}</label>
               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
               @error('email')
               <span class="invalid-feedback" role="alert">
               <strong class="text-danger">{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="password">{{ __('Password') }}</label>
               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
               @error('password')
               <span class="invalid-feedback" role="alert">
               <strong class="text-danger">{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="row mb-3">
               <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                     <label class="form-check-label" for="remember">
                     {{ __('Remember Me') }}
                     </label>
                  </div>
               </div>
            </div>
            <input type="submit" value="Login">
         </form>
      </div>
      <div class="forg">
         <p>Haven't an account? Please register <a href="{{ url('/register') }}" class="text-danger">here</a>.</p>
      </div>
   </div>
</div>
@endsection
