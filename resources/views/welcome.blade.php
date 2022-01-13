@php
    $config = [
      'appName' => config('app.name'),
      'local'   => $local = app()->getLocale(),
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CMF Task</title>
        <meta name="csrf-token" content="{{csrf_token()}}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <home-component> </home-component>
        </div>
        <script>

        </script>
        <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    </body>
</html>
