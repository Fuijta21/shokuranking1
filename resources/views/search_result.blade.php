@extends('layouts.app')

@section('content')
@endsection

@section('script')
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
<script>
    window.Laravel = {};
    window.Laravel.shop = @json($shop_info);
</script>

<script src="{{ asset('/js/maps.js') }}"></script>
<script src="{{ asset('/js/SetLocation.js') }}"></script>
<script src="{{ asset('/js/currentLocation.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyBCzdyBqWWIUDNxjhOj06D1QC_z6xMOoow&callback=initMap" async defer>
@endsection
@section('map')
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
                <p class='kensaku'> 基本条件を変更して、再検索する</p>
                <input id="sbox" type="text" name="location" placeholder="場所を入力[例：新宿、渋谷]">
                <input id="sbox2" type="text" name="term"　placeholder="キーワード[例：居酒屋、店名]">
                <input id="sbtn" type="submit" value="検索">
            </form>
        </div>
        <div id='map' style='height:300px'></div>
        {!! Form::open(['route' => 'result.curretnLocation','method' =>'get']) !!}
        {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
        {!! Form::hidden('lng','lng',['class'=>'lng_input'])!!}
        {!! Form::submit("周辺を表示", ['class' => "btn btn-success btn-block",'disabled']) !!}
        {!! Form::close() !!}
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/maps.js') }}"></script>
        <script src="{{ asset('/js/SetLocation.js') }}"></script>
        <script src="{{ asset('/js/shouasi.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyBCzdyBqWWIUDNxjhOj06D1QC_z6xMOoow&callback=initMap" async defer>
        </script>
        @csrf
        <p>検索結果</p>
        <table>
            @if(isset($shop_info))
           @foreach($shop_info as $key=>$shop)
           <div class='flex'>
                <img src="{{$shop->photos[0]}}"  id="image_size">
                <div class='shousai'>
                    <strong class='juni'><h1>{{$key+1}}位！</h1></strong>
                    <h2><a href="{{$shop->url}}">{{$shop->name}}</a></h2>
                    <p>住所　{{$shop->alias}}</p>
                    <p>電話番号 {{$shop->phone}}</p>
                    <h3 class="result-rating-rate">
                        <span class="star5_rating" data-rate="{{$shop->rating}}"></span>
                        <span class="number_rating">{{$shop->rating}}   {{$shop->review_count}}reviews</span>
                    </h3>
                </div>
            </div>
            <br>
           @endforeach
            @else
            <td>No shop</td>
            @endif
        </table>
@endsection