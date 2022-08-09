<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Inventory Management System</title>
</head>
<body>
  <nav class="nav">
      <a class="homeButton" href="/"><button>Home</button></a>
      @auth
      <form class="inline" method="POST" action="/logout">
                @csrf
                <button type="submit">
                  Logout
                </button>
      </form>
      <div>
        <span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span>
      </div>
      
      @else
      <a class="registerButton" href="/register"><button>Register</button></a>
      <a class="loginButton" href="/login"><button>Login</button></a>

      @endauth
  </nav>

    <h1>Laravel Inventory System</h1>
    <br>
      
    {{--VIEW OUTPUT--}}
    @yield('content')
</body>
</html>