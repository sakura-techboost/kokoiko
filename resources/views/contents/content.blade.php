{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','マイページ')

@section('content')
<div class="navigation">
    {{-- お気に入り・行ってみたい・いまいちのタブ形式ナビゲーション --}}
    <ul class="nav nav-tabs sticky-top bg-white">
        <li class="nav-item">
            <a href="#favorite" class="nav-link active" data-toggle="tab">
                <i class="fas fa-heart faa-tada animated-hover"></i><span class="d-none d-md-inline pl-1">お気に入り</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#someday" class="nav-link" data-toggle="tab">
                <i class="fas fa-star faa-tada animated-hover"></i><span class="d-none d-md-inline pl-1">行ってみたい</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#disliked" class="nav-link" data-toggle="tab">
                <i class="fas fa-heart-broken faa-tada animated-hover"></i><span class="d-none d-md-inline pl-1">いまいち</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#new" class="nav-link" data-toggle="tab">
                <i class="fas fa-plus faa-tada animated-hover"></i><span class="d-none d-md-inline pl-1">新規登録</span>
            </a>
        </li>
    </ul>
    {{-- タブの中身 --}}  
    <div class="tab-content">
        {{-- 検索バー --}}  
        <div class="search-bar">
          <div class="navbar-nav navbar-expand navbar-light bg-info p-0">
                  <button class="btn btn-primary">全記事</button>
                  <button class="btn btn-primary">マイ記事</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#search-menu"><i class="fas fa-search"></i></button>
                    {{-- モーダルダイアログに検索メニューを載せる --}}
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
         {{-- 新規登録 --}}
      <div class="tab-pane fade" id="new">
        <div class="d-flex justify-content-center">
            <h3>新規登録</h3>
        </div>
        <form>
        　　<div class="form-group row">
         　　　　   <label class="col-md-3 col-form-label text-md-right" for="Q_Place">名称</label>
         　　　　   <div class="col-md-5">
             　　　　   <input type="text" class="form-control" id="Q_Place">
            　　</div>
        　　</div>
        　　<div class="form-group row">
            　　<label class="col-md-3 col-form-label text-md-right" for="Q_Prefectures　Q_Cities">住所</label>
            　　<div class="col-md-5">
                　　<select class="form-control" id="Q_Prefectures">
                    　　<option>都道府県</option>
                    　　<option>北海道</option>
        　　　　            <option>青森</option>
                　　　　    <option>岩手</option>
                　　　</select>
                　　<select class="form-control" id="Q_Cities">
                    　　<option>市区町村</option>
                    　　<option>旭川市</option>
                    　　<option>札幌市</option>
                　　</select>
            　　</div>
        　　</div>
        　　<div class="form-group row">
            　　<label class="col-md-3 col-form-label text-md-right" for="Q_Address">番地等</label>
    　　    　　    <div class="col-md-5">
        　　　　　　　　    <input type="text" class="form-control" id="Q_Address">
            　　　</div>
        　　</div>
        　　<div class="form-group row">
            　　<label class="col-md-3 col-form-label text-md-right" for="Q_PhoneNumber">電話番号</label>
            　　<div class="col-md-5">
              　　　　  <input type="text" class="form-control" id="Q_PhoneNumber">
            　　</div>
        　　</div>
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
        　　<div class="form-group row">
        　　    <label class="col-md-3 col-form-label text-md-right" for="Q_Overview">概要</label>
              <div class="col-md-9">
                <textarea class="form-control" id="Q_Overview"></textarea>
              </div>
              <small class="form-text">※タグ付けをすると検索できます</small>
            </div>
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right" for="Q_SaveFolder">登録先</label>
              <div class="col-md-5">
                <select class="form-control" id="Q_SaveFolder">
                     <option>お気に入り</option>
                     <option>行ってみたい</option>
                     <option>いまいち</option>
                </select>
              </div>
            </div>
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
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right">公開・非公開</label>
              <div class="form-check form-check-inline col-md-2 ml-4">
                <input class="form-check-input" type="radio" name="status" id="public">                  
                <label class="form-check-label" for="public">公開</label>
              </div>
              <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="radio" name="status" id="private">
                <label class="form-check-label" for="private">非公開</label>
              </div>
              <label class="col-md-3 col-form-label text-md-right"></label>
              <small class="form-text d-block col-md-5">※公開すると他のユーザーからも見られるようになります</small>
              <small class="form-text">※『いまいち』に登録される内容は非公開となります</small>
            </div>
        </form>
      </div>
    </div>
</div>


@endsection