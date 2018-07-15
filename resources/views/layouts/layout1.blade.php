<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'ELearning') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap-3.3.7/dist/css/bootstrap.min.css" />
</head>
<body style="background-color: rgb(245, 248, 250); font-family: Century Gothic;">
    <div class="container">@yield('content')</div>
</body>
</html>