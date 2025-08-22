@extends('layouts.app')

@section('title','Admin Home')

@section('content')
<div class="container py-4">
  <div class="alert alert-success">Welcome, Admin!</div>
  <form action="{{ route('logout.admin') }}" method="POST">@csrf
    <button class="btn btn-outline-secondary">Logout</button>
  </form>
</div>
@endsection
