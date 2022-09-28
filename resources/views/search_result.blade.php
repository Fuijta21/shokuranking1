@extends('layouts.app')

@section('content')
@endsection

@section('script')
<script>
    window.Laravel = {};
    window.Laravel.shop = @json($shop_info);
</script>
<script src="{{ asset('/js/maps.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/Laravel.shop[0].namejs?laguage=ja&region=JP&key=AIzaSyBCzdyBqWWIUDNxjhOj06D1QC_z6xMOoow&callback=initMap" async defer>
@endsection
@section('map')
        {{Auth::user()->name}}
        <div>
            <form action="{{route('shop.search')}}" method="POST">
                @csrf
                <input type="text" name="keyword">
                <input type="submit" value="検索">
            </form>
        </div>
        <div id='map' style='height:500px'></div>

        <h1>店一覧</h1>
        <p class="edit">[<a href="/mypage">mypage</a>]</p>
        <table>
            @if(isset($shop_info))
           @foreach($shop_info as $shop)
           <p>{{$shop->name}}</p>
            <p>{{$shop->all}}</p>
           @endforeach
            @else
            <td>No shop</td>
            @endif
        </table>
@endsection