{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','マイページ')

@section('content')

<div class="navigation">
  {{-- お気に入り・行ってみたい・いまいちのタブ形式ナビゲーション --}}
  <ul class="nav nav-tabs sticky-top bg-white">
    　　<li class="nav-item" id="eighthGreen">
    　<a href="#all" class="nav-link active" data-toggle="tab" >
        <i class="fas fa-user-edit" title="マイ記事一覧"></i><span class="d-none d-md-inline pl-1">マイ記事一覧</span>
    　</a>
    </li>
    <li class="nav-item" id="eighthPink">
      <a href="#favorite" class="nav-link" data-toggle="tab">
          <i class="fas fa-heart faa-tada animated-hover"　title="お気に入り"></i><span class="d-none d-md-inline pl-1">お気に入り</span>
      </a>
    </li>
    <li class="nav-item" id="eighthYellow">
      <a href="#someday" class="nav-link" data-toggle="tab">
          <i class="fas fa-star faa-tada animated-hover" title="行ってみたい"></i><span class="d-none d-md-inline pl-1">行ってみたい</span>
      </a>
    </li>
    <li class="nav-item" id="eighthBlue">
      <a href="#disliked" class="nav-link" data-toggle="tab" >
          <i class="fas fa-heart-broken faa-tada animated-hover" title="いまいち"></i><span class="d-none d-md-inline pl-1">いまいち</span>
      </a>
    </li>
  </ul>
    {{-- タブの中身 --}}  
  <div class="tab-content">
      {{-- 検索バー --}}  
    <div class="search-bar navigation navbar-expand navbar-light bg-info p-0">
      <ul class="navbar-nav">
        <li class="nav-item" id="eighth">
          <a href=# class="nav-link"><i class="fas fa-users" title="他のユーザー記事"></i><span class="d-none d-md-inline pl-1">みんなの投稿</span></a>
        </li>
        <li class="nav-item" id="eighth">
          <a href=# class="nav-link"><i class="fas fa-user-friends" title="ミックス表示"></i><span class="d-none d-md-inline pl-1">全記事</span></a>
        </li>
        <li class="nav-item" id="eighth">
          <a href=# class="nav-link" data-toggle="modal" data-target="#new" ><i class="fas fa-plus" title="登録"></i><span class="d-none d-md-inline pl-1">登録</span></a>
        </li>
        <li class="nav-item" id="eighth">
          <a href=# class="nav-link" data-toggle="modal" data-target="#search-menu"><i class="fas fa-search" title="検索"></i></a>
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
    <div class="tab-pane fade" id="all">
      <a class="card mb-3 btn" href="#">
        <div class="row no-gutters">
          <div class="col-4 mx-auto">
          　<img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
          </div>
          <div class="col-8">
            <div class="card-body">
              <div class="row line1 h-20">
                <h5 class="card-title d-inline-block col-6">タイトル</h5>
                <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
              </div>
              <div class="row line2 h-15">
                <p class="card-text city d-inline-block col-6">都道府県</p>
                <p class="card-text category d-inline-block col-6">カテゴリ</p>
              </div>
              <div class="row line3 h-65">
                <p class="card-text summary d-block col-12">概要</p>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
      
　  <div class="tab-pane fade show active" id="favorite">
      <a class="card mb-3 btn" href="#">
        <div class="row no-gutters">
          <div class="col-4 mx-auto">
        　　<img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
          </div>
          <div class="col-8">
 　　         <div class="card-body">
              <div class="row">
                <h5 class="card-title d-inline-block col-6">タイトル</h5>
                <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
              </div>
              <div class="row">
                <p class="card-text place d-inline-block col-6">都道府県</p>
                <p class="card-text category d-inline-block col-6">カテゴリ</p>
              </div>
           　  <div class="row">
        　       <p class="card-text summary d-block col-12">概要</p>
           　  </div>
            </div>
          </div>
      　</div>
      </a>
      <a class="card mb-3 btn" href="#">
        <div class="row no-gutters">
          <div class="col-4 mx-auto">
            <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
          </div>
          <div class="col-8">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title d-inline-block col-6">タイトル</h5>
                <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
              </div>
              <div class="row">
                <p class="card-text place d-inline-block col-6">都道府県</p>
                <p class="card-text category d-inline-block col-6">カテゴリ</p>
              </div>
           　  <div class="row">
        　       <p class="card-text summary d-block col-12">概要</p>
           　  </div>
            </div>    　　
          </div>
        </div>
      </a>
    </div>
    <div class="tab-pane fade" id="someday">
      <a class="card mb-3 btn" href="#">
        <div class="row no-gutters">
          <div class="col-4 mx-auto">
            <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
          </div>
          <div class="col-8">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title d-inline-block col-6">タイトル</h5>
                <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
              </div>
              <div class="row">
                <p class="card-text place d-inline-block col-6">都道府県</p>
                <p class="card-text category d-inline-block col-6">カテゴリ</p>
              </div>
           　  <div class="row">
        　       <p class="card-text summary d-block col-12">概要</p>
           　  </div>
            </div>
          </div>
        </div>
      </a>
      <a class="card mb-3 btn" href="#">
        <div class="row no-gutters">
          <div class="col-4 mx-auto">
            <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
          </div>
          <div class="col-8">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title d-inline-block col-6">タイトル</h5>
                <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
              </div>
              <div class="row">
                <p class="card-text place d-inline-block col-6">都道府県</p>
                <p class="card-text category d-inline-block col-6">カテゴリ</p>
              </div>
           　  <div class="row">
      　         <p class="card-text summary d-block col-12">概要</p>
           　  </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="tab-pane fade" id="disliked">
      <a class="card mb-3 btn" href="#">
        <div class="row no-gutters">
          <div class="col-4 mx-auto">
            <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
          </div>
          <div class="col-8">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title d-inline-block col-6">タイトル</h5>
                <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
              </div>
              <div class="row">
                <p class="card-text place d-inline-block col-6">都道府県</p>
                <p class="card-text category d-inline-block col-6">カテゴリ</p>
              </div>
        　     <div class="row">
                <p class="card-text summary d-block col-12">概要</p>
         　    </div>
            </div>
          </div>
        </div>
      </a>
      <a class="card mb-3 btn" href="#">
        <div class="row no-gutters">
          <div class="col-4 mx-auto">
            <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
          </div>
          <div class="col-8">
            <div class="card-body">
              <div class="row line1 h-20">
                <h5 class="card-title d-inline-block col-6">タイトル</h5>
                <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
              </div>
              <div class="row line2 h-15">
                <p class="card-text city d-inline-block col-6">都道府県</p>
                <p class="card-text category d-inline-block col-6">カテゴリ</p>
              </div>
              <div class="row line3 h-65">
                <p class="card-text summary d-block col-12">概要</p>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

@endsection

@section('js')
      <script src="{{ secure_asset('js/content.js') }}" defer></script>
@endsection