<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.css') }}">
    <script src="{{ asset('resources/js/bootstrap.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.bundle.js') }}"></script>
    <title>@yield('title', 'Панель менеджера')</title>
</head>
<body>
@include('components.header')
<div class="container d-flex flex-column text-left mb-3">
    <a href="{{ route('product') }}"  class="text-decoration-none border-bottom border-danger border-4 fs-4 text-dark" type="submit" style="border-bottom: #dc3545 5px">Заказы</a>
    <a href="{{ route('category') }}"  class="text-decoration-none border-bottom border-danger border-4 fs-4 text-dark" type="submit">Заявки на бронь</a>
</div>
@yield('content')
</body>
</html>
