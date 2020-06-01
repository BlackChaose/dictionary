<!DOCTYPE HTML>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    @yield('head')
    @yield('styles')
    <script src="https://kit.fontawesome.com/0cff5b799f.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div id="module">
    @yield('content')
    </div>
</div>
@yield('scripts')
</body>
</html>
