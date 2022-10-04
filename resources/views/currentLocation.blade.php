@extends('layouts.app')

@section('content')
@endsection

@section('script')
@endsection
@section('map')
    @csrf
    <div id='map' style='height:500px'></div>

    <script>
        window.Laravel = {};
        window.Laravel.lat = @json($lat);
        window.Laravel.lng = @json($lng);
    </script>
    {!! Form::open(['route' => 'result.curretnLocation', 'method' => 'get']) !!}
    {!! Form::hidden('lat', 'lat', ['class' => 'lng_input']) !!}
    {!! Form::hidden('lng', 'lng', ['class' => 'lng_input']) !!}
    {!! Form::submit('周辺を表示', ['class' => 'btn btn-success btn-block', 'disabled']) !!}
    {!! Form::close() !!}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>


    <script src="{{ asset('/js/SetLocation.js') }}"></script>
    <script src="{{ asset('/js/currentLocation.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?laguage=ja&region=JP&key=AIzaSyBCzdyBqWWIUDNxjhOj06D1QC_z6xMOoow&callback=initMap"
        async defer></script>

    </table>

    <body>
        <p>{{ $lat }}</p>
        <p>{{ $lng }}</p>
    </body>
@endsection
