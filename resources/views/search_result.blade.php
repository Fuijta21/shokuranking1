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
        {{Auth::user()->name}}
        <div>
            <form action="{{route('shop.search')}}" method="POST">
                @csrf
                <input type="text" name="keyword">
                <input type="submit" value="検索">
            </form>
        </div>
        
        <h1>店一覧</h1>
        <p class="edit">[<a href="/mypage">mypage</a>]</p>
        <table>
            @if(isset($shop_info))
            <tr>
                <a href={{$shop_info->url}}>{{ $shop_info->name }}</a>
            </tr>
            @else
            <td>No shop</td>
            @endif
        </table>
    </body>
</html>
@endsection