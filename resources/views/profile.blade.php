@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>マイページ</h1>
        <p class="edit">[<a href="/mypage/{{$user->id}}/edit">edit</a>]</p>
        <div class='myinfo'>

            <h2 class='name'>名前　{{Auth::user()->name}}</h2>
            <h2 class='age'>年齢{{$user->age}}</h2>
            <h2 class='gender'>性別{{$user->gender}}</h2>
            <h2 class='shoukaibun'>紹介文{{$user->shoukaibun}}</h2>
        </div>

    </body>
</html>
@endsection