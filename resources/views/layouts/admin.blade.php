<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> {{-- 中身を文字列に置換、htmlの中に記載 --}}
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> {{-- 画面・文字の大きさを調整する --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title> 
            {{-- 各ページごとにtitleタグを入れるために@yieldで空けておく。@・・でメソッドを読込。指定したセッション(title)の内容を表示--}}
            <script src="{{ secure_asset('js/app.js') }}" defer></script>
                {{--Laravel標準で用意されているJavascriptを読込。secure_asset: publicディレクトリのパスを返す・生成する関数--}}
            
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet"> {{-- 自分で --}}
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/bootstrap.min.css') }}" rel="stylesheet"> {{-- ブートストラップ --}}
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}"> {{-- url()：そのままurlを返すメソッド --}}
                        {{ config('app.name', 'Laravel') }} {{-- config：フォルダのapp.phpの中にあるnameにアクセスする関数 --}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" 
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ms-auto">

                        </ul>


                        <ul class="navbar-nav">
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>