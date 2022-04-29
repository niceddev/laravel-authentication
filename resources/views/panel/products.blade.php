@extends('layouts.panel')

@section('content')
    <main>

        <div class="title">
            <h2>Users</h2>
            <a href="javascript:void(0);">Hello Bob !</a>
        </div>

        <article class="larg">
            @foreach($products as $product)
                <h4>{{ $product->name }}</h4>
                <ul>
                    @foreach($product->cities as $city)
                        <li>{{ $city->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </article>

    </main>
@endsection
