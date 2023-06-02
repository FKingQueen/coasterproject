<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"/> -->
        <title>COASTER</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script>
            (function () {
                window.Laravel = {
                    csrfToken: '{{ csrf_token() }}'
                };
            })();
        </script>
    </head>
    <body class="antialiased">
        @if (!Auth::check())
            <script>
                window.Laravel = {!!json_encode([
                    'isLoggedin' => false,
                    'csrfToken' => csrf_token() ,
                    'role_id' => false,
                ])!!}
            </script>
        @elseif(Auth::check())
            <script>
                window.Laravel = {!!json_encode([
                    'isLoggedin' => true,
                    'user' => Auth::user(),
                    'role_id' => Auth::user()->id,
                    'csrfToken' =>  csrf_token() ,
                ])!!};
            </script>
        @endif
        <div id="app">

        </div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqrwTHtdIIy2XFwP3GkVGaMqtEfjjwJuY&v=beta&callback=initMap" type="text/javascript"></script>
        <script src="{{mix('/js/app.js')}}"></script>
        <!-- <script src="vue.js"></script> -->

    </body>
</html>
