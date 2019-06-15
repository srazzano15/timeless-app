<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <link rel="shortcut icon" href="{{ asset('images/timeless_drip_logo.png') }}" type="image/x-icon">

</head>
<body>
    <div id="admin_index">
        <header class="header">
            <div class="container-fluid">
                @include('inc.navbar')
            </div>
        </header>
        <main class="main-content">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

        @include('inc.footer')
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
