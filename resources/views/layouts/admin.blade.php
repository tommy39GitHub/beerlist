<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> {{-- {{phpで書かれた内容を表示(中身を文字列に置換しhtmlの中に記載)--}}
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> {{-- edge対応 --}}
        <meta name="viewport" content="width=device-width, initial-scale=1"> {{--スマホなど画面・文字の大きさを調整 --}}
        <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- csrfトークン --}}

        <title>@yield('title')</title> 
            {{-- 各ページごとにtitleタグを入れるために@yieldで空けておく。@~~でメソッドを読込。指定したセッション(title)の内容を表示--}}
            <script src="{{ asset('js/app.js') }}" defer></script>
                {{--Laravel標準で用意のJavascriptを読込。asset(local)<-secure_asset(publicディレクトリのパスを生成する関数)--}}
            
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


        {{-- Laravel標準で用意されているCSS読込 --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"> {{-- 自分で asset(local)<-secure_asset--}}
        {{-- この章の後半で作成するCSS読込 --}}
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> {{-- asset(local)<-secure_asset--}}
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> {{-- ブートストラップの書き方でclassをいれる --}}
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}"> {{-- url()：そのままurlを返すメソッド --}}
                        {{ config('app.name', 'Laravel') }} {{-- config(フォルダ内app.php中のnameにアクセスする関数) --}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" 
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            {{-- @guestで、ログインしていなかったらログイン画面へのリンクを表示 --}}
                                @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                                @else
                                <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                                     data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span> {{--Auth::user() ログインユーザの情報取得  --}}
                                     </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('messages.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
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