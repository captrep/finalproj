@extends('auth.__style')
@section('title','Login')
@section('content')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="login-brand">
      <img src="{{asset('img/logodampasan.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
    </div>

    <div class="card card-primary">
      <div class="card-header"><h4>Login</h4></div>
      <div class="card-body">
        <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
          @csrf
          <div class="form-group">
            <label for="email">Username</label>
            <input type="text"  name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}">
              @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <div class="d-block">
              <label for="password" class="control-label">Password</label>
            </div>
            <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
              Login
            </button>
          </div>
        </form>

      </div>
    </div>
    @endsection