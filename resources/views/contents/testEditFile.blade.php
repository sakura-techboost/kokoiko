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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    {{-- FontAwsomeAnimationを読み込む --}}
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
  </head>
  <body>
    <div id="app">
      <div class="container">
        <div class="preview col-3">
          <img class="preview-cover" id="preview">
        </div>
        <div class="btn-group d-flex" role="group" aria-label="画像フォーム">
          <button type="button" class="btn btn-outline-primary w-50">
            <label for="filesend" class="col-form-label w-100">
                {{-- 画像アップロード(アイコン部分） --}}
              <div class="filelabel" title="ファイル選択">
                <i class="fas fa-camera"></i>
              </div>
                {{-- 画像アップロード(フォーム部分)※非表示 --}}
              <input class="d-none" type="file" name="datafile[]" id="filesend" multiple accept=".jpg,.png">
            </label>
          </button>
          <button type="submit" class="btn btn-primary w-50">登録</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $('form').on('change', 'input[type="file"]', event => {
      const file = event.target.files[0],
            reader = new FileReader(),
            $preview = $('.preview-cover'); // 表示する所

      // 画像ファイル以外は処理停止
      if(file.type.indexOf("image") < 0){
        return false;
      }
      // ファイル読み込みが完了した際に発火するイベントを登録
      reader.onload = function() {
          // .prevewの領域の中にロードした画像を表示
          $preview.attr('src',event.target.result);
      };

    reader.readAsDataURL(file);
});
      

    </script>
  </body>
　
