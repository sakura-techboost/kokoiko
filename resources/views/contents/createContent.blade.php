{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','新規投稿')

@section('content')
　<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card mt-5">
          <div class="card-header">
            新規投稿
          </div>
          <div class="card-body">
            <form>
              @csrf
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="name">名称</label>
                <input type="text" class="form-control" id="name" placeholder="名称">
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="url">HP</label>
                <input type="url" class="form-control" id="url" placeholder="URL">
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="overview">概要</label>
                <textarea class="form-control" id="overview" placeholder="どんなところ？"></textarea>
                <small class="form-text">※タグ付けをすると検索できます</small>
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label" for="placetype_id">登録先</label>
                <select class="form-control" id="placetype_id">
                  <option value="1">お気に入り</option>
                  <option value="2">行ってみたい</option>
                  <option value="3">いまいち</option>
                </select>
              </div>
              <!-- オプション入力フォーム -->
              <!-- 住所情報 -->
              <div class="form-group mb-2 address">
                <span class="pref_id"></span><span class="city_id"></span><span class="address"></span>
                <label class="col-form-label d-none" for="pref_id city_id">住所</label>
                <select class="form-control d-none" name="address1" id="pref_id">
                  <option></option>
                </select>
                <input type="text" name="address2" class="form-control d-none" id="city_id" placeholder="市区町村">
                <label class="col-form-label d-none" for="address">番地等</label>
                <input type="text" class="form-control d-none" id="address">
              </div>
              <!-- 電話番号情報 -->
              <div class="form-group mb-2 phone"> 
                <span></span>
                <label class="col-form-label d-none" for="phone">電話番号</label>
                <input type="text" class="form-control d-none" id="phone">
              </div>
              
              <!-- カテゴリー情報 -->
              <div class="form-group mb-2 category"> 
                <span></span>
                <label class="col-form-label d-none" for="category_id">カテゴリー</label>
                <select class="form-control d-none" id="category_id">
                  <option></option>
                </select>
              </div>
              <!-- 関心度情報 -->
              <div class="form-group mb-2 attention"> 
                <span></span>
                <label class="col-form-label" for="attention_id">関心度</label>
                <select class="form-control text-warning" id="attention_id">
                  <option></option>
                </select>
              </div>
              
              {{-- モーダルツールバー(モーダル部分はmodal.blade.phpに記述) --}}
              <div class="btn-social-giza">
                <ul class="nav">
                  <li class="nav-item">
                    <!--以下住所-->
                    <a data-toggle="modal" href="#addAddress" class="btn-social-giza-map" title="住所入力">
                      <span class="fa-stack">
                      <i class="fas fa-certificate fa-stack-2x"></i>
                      <i class="fas fa-map-marker-alt fa-stack-1x"></i>
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <!--以下電話番号-->
                    <a data-toggle="modal" href="#addPhone" class="btn-social-giza-phone" title="電話番号入力">
                      <span class="fa-stack">
                      <i class="fas fa-certificate fa-stack-2x"></i>
                      <i class="fas fa-phone fa-stack-1x"></i>
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <!--以下画像-->
                    <a data-toggle="modal" href="#addPictures" class="btn-social-giza-camera" title="画像追加">
                      <span class="fa-stack">
                      <i class="fas fa-certificate fa-stack-2x"></i>
                      <i class="fas fa-camera fa-stack-1x"></i>
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <!--以下カテゴリ-->
                    <a data-toggle="modal" href="#addCategories" class="btn-social-giza-folder" title="カテゴリー選択">
                      <span class="fa-stack">
                      <i class="fas fa-certificate fa-stack-2x"></i>
                      <i class="far fa-folder fa-stack-1x"></i>
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <!--以下関心度-->
                    <a data-toggle="modal" href="#addAttention" class="btn-social-giza-star" title="関心度">
                      <span class="fa-stack">
                      <i class="fas fa-certificate fa-stack-2x"></i>
                      <i class="fas fa-star-half-alt fa-stack-1x"></i>
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <!--以下公開非公開-->
                    <a href="#" class="btn-social-giza-open" title="公開設定">
                      <span class="fa-stack">
                      <i class="fas fa-certificate fa-stack-2x"></i>
                      <i class="fas fa-lock-open fa-stack-1x"></i>
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <!--以下公開非公開-->
                    <a href="#" class="btn-social-giza-lock" title="公開設定">
                      <span class="fa-stack">
                      <i class="fas fa-certificate fa-stack-2x"></i>
                      <i class="fas fa-lock fa-stack-1x"></i>
                      </span>
                    </a>
                  </li>
                </ul>
                <button type="button" class="btn btn-primary">登録</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
      <script src="{{ secure_asset('js/content.js') }}" defer></script>
@endsection