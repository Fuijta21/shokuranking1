@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel='stylesheet' href="/css/index.css">
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

        <div class="box3">
            <form id="form1" action="{{ route('shop.search') }}" method="POST">
                @csrf
                <p class='kensaku'>飲食店検索</p>
                <input id="sbox" type="text" name="location" placeholder="場所を入力[例：新宿、渋谷]">
                <input id="sbox2" type="text" name="term"　placeholder="キーワード[例：居酒屋、店名]">
                <input id="sbtn" type="submit" value="検索">
            </form>
        </div>

        <div id='map' style='height30px'></div>
        <script src="{{ asset('/js/maps.js') }}"></script>
        <script
            src="https:://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyBCzdyBqWWIUDNxjhOj06D1QC_z6xMOoow&callback=initMap"
            async defer>
            < /body> < /
            html >
            @endsection
