@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel='stylesheet' href="/css/profile.css">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel='stylesheet' href="/css/profile.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>

    <body>
       <div id = zentai >
        <h1>マイページ</h1>
        <div id=edit_flex>
        <p class="edit">[<a href="/mypage/edit">編集</a>]</p>
        <p class="profile">[<a href="/">戻る</a>]</p>
        </div>
        <div class='myinfo'>

            <h2 class='name'>名前　{{ Auth::user()->name }}</h2>
            <h2 class='age'>年齢  {{ $user->age }}</h2>
            <h2 class='gender'>性別  {{ $user->gender }}</h2>
            <h2 class='shoukaibun'>紹介文</h2>
            <h3 clsss='shoukaibody'>{{ $user->shoukaibun }}</h3>
        </div>
        </div>

    </body>

    </html>
@endsection
