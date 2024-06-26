@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FoodRankingMap</title>

        <!-- Fonts -->
        <link rel='stylesheet' href="/css/index.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>

    <body>


        <div class="box3">
            <form id="form1" action="{{ route('shop.search') }}" method="POST">
                @csrf
                <p class='kensaku'>飲食店検索</p>
                <div class="search_box">
                    <input id="sbox" type="text" name="location" placeholder="場所を入力[例：新宿、渋谷]">
                </div>
                <div class="search_box2">
                <input id="sbox2" type="text" name="term"　placeholder="キーワード[例：居酒屋、店名]">
                </div>
                <!--<div class="search_box3">-->
                <!--<input id="sbox3" type="text" name="review_count"　placeholder="最低評価数">-->
                <!--</div>-->
                <input id="sbtn" type="submit" value="検索する">
            </form>
        </div>

        <div id='map' style='height30px'></div>
        <script src="{{ asset('/js/maps.js') }}"></script>
        <script
            src="https:://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyBYd28Ij7DUfiruetp8Hg6imrysd9A6jl4&callback=initMap"
            async defer>
            < /body> < /
            html >
            @endsection
