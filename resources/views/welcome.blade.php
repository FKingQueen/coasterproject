<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"/> -->
        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased">
        @if (!Auth::check())
            <script>
                window.Laravel = {!!json_encode([
                    'isLoggedin' => false,
                ])!!}
            </script>
        @elseif(Auth::check())
            <script>
                window.Laravel = {!!json_encode([
                    'isLoggedin' => true,
                    'user' => Auth::user()->name,
                ])!!}
            </script>
        @endif
        <div id="app">

        </div>
        <script src="{{mix('/js/app.js')}}"></script>
    </body>
</html>
