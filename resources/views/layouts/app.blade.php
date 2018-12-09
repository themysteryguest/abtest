<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AB Test</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">

    @if(Session::has('flash_message'))
        <div class="container mt-2">
            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            @include ('errors.list') {{-- Including error file --}}
        </div>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</div>

</body>

</html>
