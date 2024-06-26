@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href="/css/edit.css">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>

    <body>
        <<<<<<< HEAD <header class="header">
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
            <h1 class='tatile'>マイページ編集画面</h1>
            =======

            >>>>>>> db8deb7ea9623335816ba0c1e77da558babcbbdf
            <form action="/mypage" method="POST">

                @method('PUT')
                @csrf
                <div class='content'>
                    <h1 class='tatile'>マイページ編集画面 </h1>
                    <div class='name'>
                        <h2>名前</h2>
                        <input class='inp' type='text' name='user[name]' value='{{ $old_user->name }}'>
                    </div>
                    <div class='sei'>
                        <h2 class="col-md-3">性別</h2>
                        <div class='col-md-4'>
                            <select class='form-control' name='user[gender]' value='{{ $old_user->gender }}'>
                                <option value="男性">男性</option>
                                <option value="女性" selected>女性</option>
                            </select>
                        </div>
                    </div>

                    <div class='age'>
                        <h2>年齢</h2>
                        <input class='inp' type='text' name='user[age]' value='{{ $old_user->age }}'>
                        <p class='age_error' style="color:red">{{ $errors->first('user.age') }}</p>
                    </div>
                    <div class='contet_title'>
                        <h2>紹介文</h2>
                        <textarea class="shokai" name="user[shoukaibun]">{{ $old_user->shoukaibun }}</textarea>

                    </div>
                    <input id='hozon' type='submit' value="保存">

                </div>
            </form>

    </body>

    </html>
@endsection
