<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name'))</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
      <div class="d-flex gap-2">
        <a class="btn btn-outline-light btn-sm" href="{{ route('register.customer.show') }}">Customer Register</a>
        <a class="btn btn-outline-light btn-sm" href="{{ route('register.admin.show') }}">Admin Register</a>
        <a class="btn btn-warning btn-sm" href="{{ route('login.admin') }}">Admin Login</a>
      </div>
    </div>
  </nav>

  @if(session('status'))
    <div class="container mt-3">
      <div class="alert alert-info">{{ session('status') }}</div>
    </div>
  @endif

  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
          crossorigin="anonymous"></script>
</body>
</html>
