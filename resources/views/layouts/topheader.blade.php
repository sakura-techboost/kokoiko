<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- 各ページごとにtitleタグを入れるために@yieldで空けておく。 --}}
    <title>@yield('title')</title>

    <!-- Scripts -->
     {{-- Laravel標準で用意されているJavascriptを読み込む --}}
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    {{-- 住所入力用のajaxzip3を読み込む --}}
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- Laravel標準で用意されているCSSを読み込む --}}
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">

    {{-- 作成したCSSを読み込む --}}
    <link href="{{ secure_asset('css/mediaqueries.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/rayouts.css') }}" rel="stylesheet">
    {{-- FontAwsomeAnimationを読み込む --}}
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
  </head>
  <body>
    <div id="app">
      @include('children.modal')
      @yield('content')
    </div>
    @yield('js')
  </body>
</html>