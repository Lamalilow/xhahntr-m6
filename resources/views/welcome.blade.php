<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/bootstrap.css">
    <link rel="stylesheet" href="/resources/css/app.css">
    <link rel="stylesheet" href="">
    <script src="/resources/js/bootstrap.js"></script>
    <script src="/resources/js/bootstrap.bundle.js"></script>
    <title>@yield('title', 'Главная страница')</title>
</head>
<body>
@include('components.header')
@yield('content')
@include('components.footer')
</body>
</html>
