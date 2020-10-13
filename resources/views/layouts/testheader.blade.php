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

      <link href="{{ secure_asset('css/testrayouts.css') }}" rel="stylesheet">
      {{-- FontAwsomeAnimationを読み込む --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
      <div class="container">
        <div class="navbar navbar-expand navbar-light bg-warning p-0  fixed-top">
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
      <div class="conteiner">
        <div class="row">
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
                <li>kokoiko<span>Our favorite places</span></li>
                <li id="eighth">
                  <a href=#><i class="fas fa-users" title="他のユーザー記事"></i>みんなの投稿</a>
                </li>
                <li id="eighth">
                  <a href=#><i class="fas fa-user-friends" title="ミックス表示"></i>全記事</a>
                </li>
                <li id="eighth">
                  <a href=# data-toggle="modal" data-target="#new" ><i class="fas fa-plus" title="登録"></i>登録</a>
                </li>
                <li id="eighth">
                  <a href=# data-toggle="modal" data-target="#search-menu"><i class="fas fa-search" title="検索"></i></a>
                </li>
              </ul>
                     {{-- モーダルダイアログに新規登録フォーム(#new)を載せる --}}
            　<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">新規登録</h5>
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form>{{-- 新規登録フォーム --}}
                        <div class="form-group mb-2">
                          <label class="col-form-label sr-only" for="Q_Place">名称</label>
                          <input type="text" class="form-control" id="Q_Place" placeholder="名称">
                        </div>
                        <div class="form-group mb-2">
                          <label class="col-form-label sr-only" for="Q_Overview">概要</label>
                          <textarea class="form-control" id="Q_Overview" placeholder="どんなところ？"></textarea>
                          <small class="form-text">※タグ付けをすると検索できます</small>
                        </div>
                        <div class="form-group mb-2">
                          <label class="col-form-label" for="Q_SaveFolder">登録先</label>
                          <select class="form-control" id="Q_SaveFolder">
                            <option>お気に入り</option>
                            <option>行ってみたい</option>
                            <option>いまいち</option>
                          </select>
                        </div>
                        {{-- モーダルツールバー --}}
                        <div class="btn-social-giza">
                          <!--以下住所-->
                          <a data-toggle="modal" href="#addAddress" class="btn-social-giza-map" title="住所入力">
                            <span class="fa-stack">
                            <i class="fas fa-certificate fa-stack-2x"></i>
                            <i class="fas fa-map-marker-alt fa-stack-1x"></i>
                            </span>
                          </a>
                          <div class="modal fade" id="addAddress" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addAddress" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="addAddress">住所入力</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div class="form-group row"> {{-- 住所入力 --}}
                                    　　<label class="col-md-3 col-form-label text-md-right" for="inputAddress01">郵便番号</label>
                                    　　<div class="col-md-7">
                                    　　    <input type="text" name="zip1" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" /> - <input type="text" name="zip2" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" /><br>
                                    　　</div>
                                    　　<label class="col-md-3 col-form-label text-md-right" for="inputAddress02 inputAddress03">住所</label>
                                  　　<div class="col-md-5">
                                    　　<select class="form-control" name="address1" id="inputAddress02">
                                    　　    <option value="">-- 都道府県 --</option>
                                    　　    <option value="北海道">北海道</option>
                                          <option value="青森県">青森県</option>
                                          <option value="岩手県">岩手県</option>
                                          <option value="宮城県">宮城県</option>
                                          <option value="秋田県">秋田県</option>
                                          <option value="山形県">山形県</option>
                                          <option value="福島県">福島県</option>
                                          <option value="茨城県">茨城県</option>
                                          <option value="栃木県">栃木県</option>
                                          <option value="群馬県">群馬県</option>
                                          <option value="埼玉県">埼玉県</option>
                                          <option value="千葉県">千葉県</option>
                                          <option value="東京都">東京都</option>
                                          <option value="神奈川県">神奈川県</option>
                                          <option value="新潟県">新潟県</option>
                                          <option value="富山県">富山県</option>
                                          <option value="石川県">石川県</option>
                                          <option value="福井県">福井県</option>
                                          <option value="山梨県">山梨県</option>
                                          <option value="長野県">長野県</option>
                                          <option value="岐阜県">岐阜県</option>
                                          <option value="静岡県">静岡県</option>
                                          <option value="愛知県">愛知県</option>
                                          <option value="三重県">三重県</option>
                                          <option value="滋賀県">滋賀県</option>
                                          <option value="京都府">京都府</option>
                                          <option value="大阪府">大阪府</option>
                                          <option value="兵庫県">兵庫県</option>
                                          <option value="奈良県">奈良県</option>
                                          <option value="和歌山県">和歌山県</option>
                                          <option value="鳥取県">鳥取県</option>
                                          <option value="島根県">島根県</option>
                                          <option value="岡山県">岡山県</option>
                                          <option value="広島県">広島県</option>
                                          <option value="山口県">山口県</option>
                                          <option value="徳島県">徳島県</option>
                                          <option value="香川県">香川県</option>
                                          <option value="愛媛県">愛媛県</option>
                                          <option value="高知県">高知県</option>
                                          <option value="福岡県">福岡県</option>
                                          <option value="佐賀県">佐賀県</option>
                                          <option value="長崎県">長崎県</option>
                                          <option value="熊本県">熊本県</option>
                                          <option value="大分県">大分県</option>
                                          <option value="宮崎県">宮崎県</option>
                                          <option value="鹿児島県">鹿児島県</option>
                                          <option value="沖縄県">沖縄県</option>
                                    　　　</select>
                                    　　<input type="text" name="address2" class="form-control" id="inputAddress03" placeholder="市区町村">
                                  　　</div>
                                　　</div>
                                　　<div class="form-group row">
                                  　　<label class="col-md-3 col-form-label text-md-right" for="Q_Address">番地等</label>
                          　　    　　    <div class="col-md-5">
                              　　　　　　　　    <input type="text" class="form-control" id="Q_Address">
                                  　　　</div>
                                　　</div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">登録</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--以下電話番号-->
                          <a data-toggle="modal" href="#addPhoneNunber" class="btn-social-giza-phone" title="電話番号入力">
                            <span class="fa-stack">
                            <i class="fas fa-certificate fa-stack-2x"></i>
                            <i class="fas fa-phone fa-stack-1x"></i>
                            </span>
                          </a>
                          <div class="modal fade" id="addPhoneNunber" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPhoneNunber" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="addPhoneNunber">電話番号登録</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div class="form-group row">
                                  　　<label class="col-md-3 col-form-label text-md-right" for="Q_PhoneNumber">電話番号</label>
                                  　　<div class="col-md-5">
                                    　　　　  <input type="text" class="form-control" id="Q_PhoneNumber">
                                  　　</div>
                                  　</div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">登録</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--以下画像-->
                          <a data-toggle="modal" href="#addPictures" class="btn-social-giza-camera" title="画像追加">
                            <span class="fa-stack">
                            <i class="fas fa-certificate fa-stack-2x"></i>
                            <i class="fas fa-camera fa-stack-1x"></i>
                            </span>
                          </a>
                          <div class="modal fade" id="addPictures" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPictures" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="addPictures">画像追加</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div class="form-group row cameraicon">
                                      <label for="filesend" class="col-md-3 col-form-label text-md-righit">
                                        {{-- 画像アップロード(アイコン部分） --}}
                              　　    　   <div class="filelabel" title="ファイル選択">
                                  　　      <i class="fas fa-camera"></i>
                                      　　</div>
                                        {{-- 画像アップロード(フォーム部分)※非表示 --}}
                                      　<input type="file" name="datafile" id="filesend" multiple accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
                                      </label>
                                      {{-- プレビューを表示する場所 --}}
                                      <div class="col-md-9">
                                        <div class="preview">
                                          <span class="d-inline-block" id="previewbox"></span>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">登録</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--以下カテゴリ-->
                          <a data-toggle="modal" href="#addCategories" class="btn-social-giza-folder" title="カテゴリー選択">
                            <span class="fa-stack">
                            <i class="fas fa-certificate fa-stack-2x"></i>
                            <i class="far fa-folder fa-stack-1x"></i>
                            </span>
                          </a>
                          <div class="modal fade" id="addCategories" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addCategories" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="addCategories">カテゴリー選択</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div class="form-group row">
                                  　　<label class="col-md-3 col-form-label text-md-right" for="Q_Categories">カテゴリー</label>
                                  　　<div class="col-md-5">
                                    　　  <select class="form-control" id="Q_Categories">
                                      　　<option>グルメ</option>
                                      　　<option>ファッション</option>
                                    　　　　  <option>雑貨</option>
                                      　　　<option>観光スポット</option>
                              　　    　　</select>
                                　　　　</div>
                                　　　</div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">登録</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--以下関心度-->
                          <a data-toggle="modal" href="#addAttention" class="btn-social-giza-star" title="関心度">
                            <span class="fa-stack">
                            <i class="fas fa-certificate fa-stack-2x"></i>
                            <i class="fas fa-star-half-alt fa-stack-1x"></i>
                            </span>
                          </a>
                          <div class="modal fade" id="addAttention" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addAttention" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="addAttention">関心度選択</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div class="form-group row">
                                      <label class="col-md-3 col-form-label text-md-right" for="Q_Attention">関心度</label>
                                      <div class="col-md-5">
                                        <select class="form-control text-warning" id="Q_Attention">
                                          <option>★★★★★</option>
                                          <option>★★★★☆</option>
                                          <option>★★★☆☆</option>
                                          <option>★★☆☆☆</option>
                                          <option>★☆☆☆☆</option>
                                        </select>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">登録</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--以下公開非公開-->
                          <a href="#" class="btn-social-giza-open" title="公開設定">
                            <span class="fa-stack">
                            <i class="fas fa-certificate fa-stack-2x"></i>
                            <i class="fas fa-lock-open fa-stack-1x"></i>
                            </span>
                          </a>
                          <!--以下公開非公開-->
                          <a href="#" class="btn-social-giza-lock" title="公開設定">
                            <span class="fa-stack">
                            <i class="fas fa-certificate fa-stack-2x"></i>
                            <i class="fas fa-lock fa-stack-1x"></i>
                            </span>
                          </a>
                          <button type="button" class="btn btn-primary">登録</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
                
                       {{-- モーダルダイアログに検索メニュー(#search-menu)を載せる --}}
            　<div class="modal fade" id="search-menu" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group mb-4">
                          <label class="sr-only" for="kw">検索キーワード</label>
                          <input type="search" class="form-control" placeholder="キーワード" id="kw">
                        </div>
                        <div class="form-group mb-4 city">
                          <label for="receipt">都道府県</label>
                          <select class="form-control" id="city">
                            <option>未選択</option>
                            <option>北海道</option>
                            <option>青森</option>
                            <option>東京</option>
                          </select>
                        </div>
                        <div class="form-group mb-4">
                          <label for="receipt">カテゴリ</label>
                          <select class="form-control" id="category">
                            <option>未選択</option>
                            <option>グルメ</option>
                            <option>ファッション</option>
                            <option>雑貨</option>
                          </select>
                        </div>
                        <button type="button" class="btn btn-primary">検索</button>
                      </form>
                  　</div>
                　</div>
              　</div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="row justify-content-center">
              <div class="col-md-10">
                @yield('testContent')
              </div>
            </div>
          </div>
        </div>
      </div>


      
    </body>