<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Inventory Management System</title>
</head>
<body>
<a class="homeButton" href="/">Home</a>
@auth
<span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span>
<form class="inline" method="POST" action="/authenticate">
          @csrf
          <button type="submit">
            Logout
          </button>
</form>
@else
<a class="registerButton" href="/register">Register</a>
<a class="loginButton" href="/login">Login</a>
@endauth
    <h1>Laravel Inventory System</h1>
    <br>
      
    {{--VIEW OUTPUT--}}
    @yield('content')
</body>
</html>