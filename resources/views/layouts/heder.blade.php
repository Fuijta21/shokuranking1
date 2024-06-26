<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Qiita風記事投稿サービス</title>
        <!-- cssをインポート -->
       <link rel='stylesheet' href="../css/index.css">
    <body>
        @include('parts.header')
        @yield('content')
         <script src="{{ asset('/js/maps.js') }}"></script>
    </body>
</html>
