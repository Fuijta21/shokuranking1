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
                <p>場所</p>
                <input type="text" name="location" value="{{$keyword}}">
                <br>
                <p>term</p>
                <input type="text" name="term">
                <input type="submit" value="検索">
            </form>
        </div>

        <div id='map' style='height:500px'></div>
        <script src="{{ asset('/js/maps.js') }}"></script>
        <script src="https:://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyBCzdyBqWWIUDNxjhOj06D1QC_z6xMOoow&callback=initMap" async defer>
        
        <h1>店一覧</h1>
        <p class="edit">[<a href="/mypage">mypage</a>]</p>
        <table>
            @forelse($shops as $shop)
            <tr>
                <td>{{ $shop->shop_name }}</td>
                <td>{{$shop->keyword}}</td>
            </tr>
            @empty
            <td>No shop</td>
            @endforelse
        </table>
    </body>
</html>
@endsection