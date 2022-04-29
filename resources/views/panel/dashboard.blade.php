@extends('layouts.panel')

@section('content')
    <main>
        <div class="title">
            <h2>Users</h2>
            <a href="javascript:void(0);">Hello Bob !</a>
        </div>

        @forelse($notifications as $notification)
            <div class="notif success">
                <h2>{{ $notification->data['name'] }}</h2>
                <p>{{  $notification->data['email'] }}</p>
                <button data-id="{{ $notification->id }}">Mark as read</button>
            </div>
        @empty
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
@endsection
