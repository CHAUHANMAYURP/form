@extends('layouts.app')

@section('title','Verify Email')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-header">Enter Verification Code</div>
        <div class="card-body">
          <form method="POST" action="{{ route('verify.submit') }}">
            @csrf

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" value="{{ old('email', $email ?? '') }}" class="form-control @error('email') is-invalid @enderror">
              @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Verification Code</label>
              <input type="text" name="code" maxlength="6" class="form-control @error('code') is-invalid @enderror" placeholder="6-digit code">
              @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button class="btn btn-success w-100">Verify</button>
          </form>
          <div class="mt-3 small text-muted">Check email.</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
