<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div id="app">
     
    @if(Route::currentRouteName()!= 'public.index')
         @include('components.navbar')
       
            @yield('content')
    @else
         @include('components.navbar')
         @include('components.headerHome')
            @yield('content')
            
         @include('components.footer')
    @endif
    </div>

    <!-- Scripts -->

    <script src="https://kit.fontawesome.com/5f18af2e46.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>

     <!--FontAwsome-->

     <script src="https://kit.fontawesome.com/08e7b077b9.js" crossorigin="anonymous"></script>
    
</body>
</html>
