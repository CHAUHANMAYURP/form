@extends('layouts.app')

@section('title','Admin Registration')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header">Admin Registration</div>
        <div class="card-body">
          <form method="POST" action="{{ route('register.admin') }}">
            @csrf

            <div class="mb-3">
              <label class="form-label">First Name</label>
              <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror">
              @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Last Name</label>
              <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror">
              @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

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

            <button class="btn btn-danger w-100">Register as Admin</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
