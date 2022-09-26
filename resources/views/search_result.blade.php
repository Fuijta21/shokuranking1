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
        <div id='map' style='height:500px'></div>
        <script src="{{ asset('/js/maps.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyBCzdyBqWWIUDNxjhOj06D1QC_z6xMOoow&callback=initMap" async defer>
        </script>
        <h1>店一覧</h1>
        <p class="edit">[<a href="/mypage">mypage</a>]</p>
        <table>
            @if(isset($shop_info))

           @foreach($shop_info as $shop)
           <p>{{$shop->name}}</p>
           @endforeach
            @else
            <td>No shop</td>
            @endif
        </table>
    </body>
</html>
@endsection
