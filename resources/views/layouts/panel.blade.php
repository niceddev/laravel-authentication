<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                    <form action="{{ route('panel.logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="title">
            <h2>Users</h2>
            <a href="javascript:void(0);">Hello Bob !</a>
        </div>
        @forelse($notifications as $notification)
            <div class="notif success">
                <h2>{{ $notification->name }}</h2>
                <p>{{  $notification->email }}</p>
            </div>
        @empty
            Nothing
        @endforelse

        <article class="larg">
            @foreach($users as $user)
                <div>
                    <h3>{{ $user->name }}</h3>
                    <h4>{{ $user->email }}</h4>
                    <h4>{{ $user->role }}</h4>
                </div>
            @endforeach
        </article>

    </main>
</body>
</html>
