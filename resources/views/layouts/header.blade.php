<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
      <title>@yield('title')</title>

      <!-- Scripts -->
       {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
      <script src="{{ secure_asset('js/app.js') }}" defer></script>
      {{-- 住所入力用のajaxzip3を読み込む --}}
      <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>


      <!-- Fonts -->
      <link rel="dns-prefetch" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

      <!-- Styles -->
      {{-- Laravel標準で用意されているCSSを読み込みます --}}
      <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
      {{-- この章の後半で作成するCSSを読み込みます --}}
      <link href="{{ secure_asset('css/rayouts.css') }}" rel="stylesheet">
      {{-- FontAwsomeAnimationを読み込む --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body ontouchstart="">
      <div id="app">
        {{-- ナビゲーションバー --}}
        <header>
          <div class="container">
            <div class="navbar navbar-expand navbar-light bg-warning p-0">
              <ul class="navbar-nav">
                {{-- ログインしていなければトップページへのリンクを表示 --}}
                @guest
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-map" title="トップページへ"></i><span class="d-none d-md-inline pl-1">トップ</span></a></li>
                @endguest
      　　        {{-- ログインしていればマイページへのリンクを表示 --}}
      　　        @auth
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-home" title="マイページへ"></i><span class="d-none d-md-inline pl-1">マイページ</span></a></li>
                @endauth
              </ul>
              <ul class="navbar-nav ml-auto">
                {{-- ログインしてなければログイン画面へのリンクを表示 --}}
                @guest
                　　<li class="nav-item"><a href="{{ route('profile.create') }}" class="nav-link"><i class="fas fa-user-plus" title="新規登録"></i><span class="d-none d-md-inline pl-1">新規登録</span></a></li>
                   <li class="nav-item"><a href="{{ route('profile.login') }}" class="nav-link"><i class="fas fa-user-circle" title="ログイン"></i><span class="d-none d-md-inline pl-1">ログイン</span></a></li>
                @endguest
                {{-- ログインしていればログアウト画面へのリンクを表示 --}}
                @auth
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-user-circle" title="ログアウト"></i><span class="d-none d-md-inline pl-1">ログアウト</span></a></li>
                @endauth
              </ul>
            </div>
          </div>
        </header> 
        {{-- コンテンツ 上下のパディング1rem --}}
        <main>
          
          <div class="container">
               @yield('content')
          </div>
          
        </main>
      </div>
      @yield('js')
    </body>