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
            <div class='name'>
                <h2>名前</h2>
                <input type='text' name='user[name]' value='{{$old_user->name}}'>
            </div>
            <div class='sei'>
                <label for="sei01" class="col-md-4 col-form label text-md-right">性別</label>
                <div class='col-md-4'>
                    <select class='form-control' id='sel01' name='user[gender]' value='{{$old_user->gender}}'>
                        <option value="男性">男性</option>
                        <option value="女性" selected>女性</option>
                    </select>
                </div>
            </div>
            <div class='age'>
                <h2>年齢</h2>
                <input type='text' name ='user[age]' value='{{$old_user->age}}'>
                <p class='age_error' style="color:red">{{ $errors->first('user.age')}}</p>
            </div>
            <div class='contet_title'>
                <h2>紹介文</h2>
                <input type='text' name ='user[shoukaibun]' value='{{$old_user->shoukaibun}}'>
            </div>
            <input type='submit' value="保存">
        </form>
    </div>
    </body>
</html>
@endsection