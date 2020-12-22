<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>BookStore-@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>


    <!-- As a link -->



<div class="container">


    <nav class="navbar navbar-light bg-light">
        @auth
        <a class="navbar-brand" href="logout">logout</a>
        <a class="navbar-brand disabled" href="register">Hello{{ Auth::user()->email}}</a>

        @endauth
        @guest
        <a class="navbar-brand" href="login">login</a>
        <a class="navbar-brand" href="register">register</a>
        @endguest

      </nav>


    @yield('main')

</div>

</body>
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}">
<body>

</body>
</html>
