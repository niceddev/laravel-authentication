<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel</title>
    <link rel="stylesheet" href="{{ mix('css/panel.css') }}">
</head>
<body>
    @yield('content')
    <script src="{{ mix('js/panel.js') }}"></script>
</body>
</html>
