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
    <h1 class='tatile'>マイページ編集画面</h1>
    <div class='content'>
        <form action="/mypage/" method='POST'>
            @csrf
            @method('PUT')
            <div class='contet_title'>
                <h2>紹介文</h2>
                <input type='text' name ='user[shoukaibun]' value='{{$user->shoukaibun}}'>
            </div>
            <input type='submit' value="保存">
        </form>
    </div>
    </body>
</html>
@endsection