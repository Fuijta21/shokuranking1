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
        <div>
            <form action="{{route('shop.index')}}" method="GET">
                <input type="text" name="keyword" value="{{$keyword}}">
                <input type="submit" value="検索">
            </form>
        </div>
        
        <h1>店一覧</h1>
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
