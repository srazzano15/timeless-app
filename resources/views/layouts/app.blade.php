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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    

    <link rel="shortcut icon" href="{{ asset('images/timeless_drip_logo.png') }}" type="image/x-icon">

</head>
<body>
    <div id="admin_index">
        <v-app>
            <v-toolbar
							app
							class="background--grey "
						>
							<v-layout
								class="justify-xs-center"
							>
								<img src="images/timeless_drip_logo.png" alt="Timeless Vapes Logo" class="main__logo text-xs-center">

								<v-toolbar-title
									class="white--text display-1 font-weight-light hidden-xs-only"
								>Timeless Batch Master</v-toolbar-title>
							</v-layout>

						</v-toolbar>

        @yield('content')
        <vue-footer></vue-footer>
        </v-app>
    </div>

        
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
