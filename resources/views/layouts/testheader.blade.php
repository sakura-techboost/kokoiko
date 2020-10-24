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
      <link href="{{ secure_asset('css/mediaqueries.css') }}" rel="stylesheet">
      <link href="{{ secure_asset('css/testrayouts.css') }}" rel="stylesheet">
      {{-- FontAwsomeAnimationを読み込む --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
      <div id="app">
        <div class="container">
          <div class="navbar navbar-expand navbar-light bg-warning p-0  fixed-top">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item" id="eighth">
                
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            {{-- ログインしてなければログイン画面へのリンクを表示 --}}
            @guest
              <li class="nav-item" id="eighth"><a href="{{ route('profile.create') }}" class="nav-link"><i class="fas fa-user-plus" title="新規登録"></i><span class="d-none d-md-inline pl-1">新規登録</span></a></li>
              <li class="nav-item" id="eighth"><a href="{{ route('profile.login') }}" class="nav-link"><i class="fas fa-user-circle" title="ログイン"></i><span class="d-none d-md-inline pl-1">ログイン</span></a></li>
            @endguest
            {{-- ログインしていれば登録ボタンとユーザーメニューをドロップダウンで表示 --}}
            @auth
            　<!-- 登録ボタン -->
            　<li class="nav-item" id="eighth"><a href="{{ route('contents.createContent') }}" data-target="#new" ><i class="fas fa-plus" title="登録"></i>登録</a></li>
              <li class="nav-item dropdown" id="eighth">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-circle" title="ユーザーメニュー"></i><span class="d-none d-md-inline pl-1">〇〇さん</span>
                </a>
                <div class="dropdown-menu">
                  <a href="#" class="dropdown-item">プロフィール</a>
                  <a href="#" class="dropdown-item">リスト</a>
                  <a href="#" class="dropdown-item">お問い合わせ</a>
                  <a href="#" class="dropdown-item">ログアウト</a>
                </div>
              </li>
            @endauth
            </ul>
          </div>
        </div>
        <div class="conteiner">
          <div class="row  justify-content-center">
            <div class="col-md-3">
              {{-- ナビゲーションバー --}}
              <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
              {{-- サイドバー --}}
              <label for="openSidebarMenu" class="sidebarIconToggle">
                <div class="spinner diagonal part-1"></div>
                <div class="spinner horizontal"></div>
                <div class="spinner diagonal part-2"></div>
              </label>
              <div id="sidebarMenu" class="sidebarMenu">
                <ul class="sidebarMenuInner">
                  {{-- ログインしていなければトップページへのリンクを表示 --}}
                @guest
                  <li id="eighth"><a href="#" title="トップページへ">kokoiko<span>Our favorite places</span></a></li>
                @endguest
    　　        {{-- ログインしていればトップページとマイページへのリンクを表示 --}}
    　　          @auth
    　　            <li id="eighth"><a href="#" title="トップページへ">kokoiko<span>Our favorite places</span></a></li>
                  <li class="nav-item" id="eighth"><a href="#" class="nav-link"><i class="fas fa-home" title="マイページへ"></i><span class="d-none d-md-inline pl-1">マイページ</span></a></li>
                @endauth
                  <li id="eighth">
                    <a href=#><i class="fas fa-users" title="他のユーザー記事"></i>みんなの投稿</a>
                  </li>
                  <li id="eighth">
                    <div class="card">
                      <h6 class="card-header">エリアから探す</h6>
                      <div class="card-body">
                        <button type="button" class="btn btn-sm btn-info"
                        　data-toggle="popover" 
                        　title="タイトル" 
                        　data-content="なんかそういうbladeを書くかもしれない">
                          都道府県
                        </button>
                        <div class="media">
                          <img src="{{ asset('images/日本地図のアイコン (1).jpeg') }}" class="align-self-center mr-3" alt="...">
                          <div class="media-body">
                            <a href="#">地図で見る</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li id="eighth">
                    <a href=# data-toggle="modal" data-target="#search-menu"><i class="fas fa-search" title="検索">検索</i></a>
                  </li>
                </ul>
              </div>         
            </div>
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-10">
                  @include('children.modal')
                  @yield('testContent')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @yield('js')
    </body>