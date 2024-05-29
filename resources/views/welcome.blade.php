<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.css') }}">
    <script src="{{ asset('resources/js/bootstrap.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.bundle.js') }}"></script>
    <link rel="icon" href="{{asset('/public/storage/favicon.ico')}}" type="image/x-icon">
    <title>@yield('title', 'Главная страница')</title>
</head>
<body style="font-family: 'Comfortaa', sans-serif;background-color:white">
@include('components.header')
@yield('content')
</body>
</html>





