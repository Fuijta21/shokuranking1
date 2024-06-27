@extends('layouts.app')

@section('content')
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
@endsection

@section('script')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel='stylesheet' href="/css/search_result.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
<script>//グローバル定義して別ファイルJavascriptであつかうほうほう
    window.Laravel = {};
    window.Laravel.shop = @json($shop_info);//shop_infoはyelpから得た情報
</script>

<script src="{{ asset('/js/maps.js') }}"></script>
<script src="{{ asset('/js/SetLocation.js') }}"></script>
<script src="{{ asset('/js/currentLocation.js') }}"></script><!--google mapを初期化し指定された位置にマーカー表示する -->
<script src="{{ asset('/js/gazou.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyDlKgPaV65IBh3J5HllqnB1OXJ9N1_WAMM&callback=initMap" async defer>
@endsection
@section('map')
        <div id='map' style='height:300px'></div>
        {{--{!! Form::open(['route' => 'result.curretnLocation','method' =>'get']) !!}//web.phpのcurrentLoCationに送られる
        {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
        {!! Form::hidden('lng','lng',['class'=>'lng_input'])!!}
        {!! Form::submit("周辺を表示", ['class' => "btn btn-success btn-block",'disabled']) !!}
        {!! Form::close() !!}--}}
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/maps.js') }}"></script>
        <script src="{{ asset('/js/SetLocation.js') }}"></script>
        {{--<script src="{{ asset('/js/shouasi.js') }}"></script>--}}
        <script src="{{ asset('/js/gazou.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyDlKgPaV65IBh3J5HllqnB1OXJ9N1_WAMM&callback=initMap" async defer>//map.jsのinitmapが実行される
        </script>
        @csrf
        <div id="kensakukekka">
        <p id="kekka">検索結果</p>

        <table>
            @if(isset($shop_info))
           @foreach($shop_info as $key=>$shop)
           @if($key  < 9)
           <div class='flex'>
                <div class="carousel-container">
                    <div class="carousel" id="carousel-{{$key}}">
                        <div class="box box-1"><img src="{{$shop->photos[0]}}"  class="img image_size1"></div>
                        <div class="box box-2"><img src="{{$shop->photos[1]}}"   class="img image_size2"></div>
                        <div class="box box-3"><img src="{{$shop->photos[2]}}"   class="img image_size3"></div>
                        {{--<div class="box box-4"><img src="{{$shop->photos[3]}}"  id="image_size4"></div>--}}
                    </div>
                    <button class="lt" id="lt-{{$key}}"><</button>
                    <button class="gt" id="gt-{{$key}}">></button>
                    @if($key==0)
                    <div class="rank">
                        <dev  class='ra'>
                            <img src="../fig/kin.png"   class="ran ranking1">
                            <p class="ran1">1</p>
                        </div>
                    </dev>
                    @elseif($key==1)
                    <div class="rank"><dev class='ra'><img src="../fig/gin.png"   class="ran ranking1">
                    <p class="ran1">2</p></div></dev>
                    @elseif($key==2)
                    <div class="rank"><dev class='ra'><img src="../fig/dou.png"   class="ran ranking1">
                    <p class="ran1">3</p></div></dev>
                    @else
                    <div class="rank"><dev class='ra'><img src="../fig/aka.png"   class="ran ranking1">
                    <p class="ran1">{{$key}}</p></div></dev>
                    @endif
                </div>
                <div class='shousai'>{{--https://icooon-mono.com/13225-%e3%83%96%e3%83%83%e3%82%af%e3%83%9e%e3%83%bc%e3%82%af%e3%81%ae%e7%84%a1%e6%96%99%e3%82%a2%e3%82%a4%e3%82%b3%e3%83%b31/--}}
                    <h2 id = 'name'><a href="{{$shop->url}}">{{$shop->alias}}</a></h2>
                    <div id=category_flex>
                    <p id = category1 >{{$shop->categories[0]->alias}}  </p>
                    @if(isset($shop->categories[1]->alias) and $shop->categories[1])
                    <p id = category2 >{{$shop->categories[1]->alias}}</p>
                    @endif
                    </div>
                    <p id=jusyo>住所　{{$address[$key]['address']}}</p>
                    <p id = denwa>電話番号 {{$shop->phone}}</p>
                    <h3 class="result-rating-rate">
                        <span class="star5_rating" data-rate="{{$shop->rating}}"></span>
                        <span class="number_rating">{{$shop->rating}}   {{$shop->review_count}}reviews</span>
                    </h3>
                </div>
            </div>
            </div>
            <br>
           @endif
           @endforeach
            @else
            <td>No shop</td>
            @endif
        </table>
@endsection