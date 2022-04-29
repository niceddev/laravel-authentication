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
    <span class="bckg"></span>
    <header>
        <h1><a href="{{ route('panel.index') }}">Dashboard</a></h1>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('panel.index') }}">Users</a>
                </li>
                <li>
                    <a href="{{ route('panel.products') }}">Products</a>
                </li>
                <li>
                    <form action="{{ route('panel.logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    @yield('content')
    <script src="{{ mix('js/panel.js') }}"></script>
</body>
</html>
