@extends('layouts.app')

@section('title','Admin Login')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-header">Admin Login</div>
        <div class="card-body">
          <form method="POST" action="{{ route('login.admin.submit') }}">
            @csrf

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
              @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
              @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button class="btn btn-primary w-100">Login</button>
          </form>

          <div class="mt-3 small">
            <a href="{{ route('register.admin.show') }}">Create admin account</a> |
            <a href="{{ route('register.customer.show') }}">Customer register</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
