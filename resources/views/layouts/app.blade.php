<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}" >
        <title>{{config('app.name', 'Salon-Management')}}: @yield('customized')</title>
        {{-- <link rel="stylesheet" href="{{asset('css/semantic.min.css')}}" > --}}

    </head>
    <body>
        @include('inc.navbar')
        @yield('main-nav')
        <div class="container">
            @yield('content')
        </div>
        <p id="footer" class="text-center">Copyright &copy; 2018 Terms and coditions</p>

    </body>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</html>