@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel='stylesheet' href="/css/index.css">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel='stylesheet' href="/css/profile.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="header">
            <div class="header-inner inner">
                <h1 class="header-title"><a href="/">食ランキング</a></h1>
                <nav class="header-nav">
                    <ul class="header-nav-list">
                        <li class="header-nav-item"><a class="header-nav-item-link" href="mypage">最近見たお店</a></li>
                        <li class="header-nav-item"><a class="header-nav-item-link" href="mypage">mypage</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <h1>マイページ</h1>
        <p class="edit">[<a href="/mypage/edit">edit</a>]</p>
        <p class="profile">[<a href="/">戻る</a>]</p>
        <div class='myinfo'>

            <h2 class='name'>名前　{{ Auth::user()->name }}</h2>
            <h2 class='age'>年齢{{ $user->age }}</h2>
            <h2 class='gender'>性別{{ $user->gender }}</h2>
            <h2 class='shoukaibun'>紹介文{{ $user->shoukaibun }}</h2>
        </div>

    </body>

    </html>
@endsection
