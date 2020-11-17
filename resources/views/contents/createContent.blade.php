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
              <div class="row no-gutters mb-2 preview-box d-none"> 
                
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="name">名称</label>
                <input type="text" class="form-control" id="name" placeholder="名称">
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
                <span class="postalcode"></span><br>
                <span class="pref_id"></span><span class="city_id"></span><span class="address"></span>
                <input type="text" name="address2" class="form-control d-none" id="postalcode" placeholder="郵便番号">
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
              <!-- ホームページ情報 -->
              <div class="form-group mb-2 url"> 
                <span></span>
                <label class="col-form-label d-none" for="url">URL</label>
                <input type="text" class="form-control d-none" id="url">
              </div>
              {{-- モーダルツールバー(モーダル部分はmodal.blade.phpに記述) --}}
              <div class="btn-group d-flex" role="group" aria-label="追加情報入力">
                <button type="button" class="btn create-btn" style="flex-basis: 20%">
                  <label for="filesend" class="col-form-label w-100">
                      {{-- 画像アップロード(アイコン部分） --}}
                    <div class="filelabel" title="ファイル選択">
                      <i class="fas fa-camera"></i>
                    </div>
                      {{-- 画像アップロード(フォーム部分)※非表示 --}}
                    <input class="d-none" type="file" name="datafile" id="filesend" multiple accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
                  </label>
                </button>
                <button type="button" class="btn create-btn" data-toggle="modal" href="#addAddress" style="flex-basis: 20%">
                  <i class="fas fa-map-marker-alt"></i>
                </button>
                <button type="button" class="btn create-btn" data-toggle="modal" href="#addPhone" style="flex-basis: 20%">
                  <i class="fas fa-phone"></i>
                </button>
                <button type="button" class="btn create-btn" data-toggle="modal" href="#addCategories" style="flex-basis: 20%">
                  <i class="far fa-folder"></i>
                </button>
                <button type="button" class="btn create-btn" data-toggle="modal" href="#addUrl" style="flex-basis: 20%">
                  <i class="fas fa-link"></i>
                </button>
              </div>
              <div class="row no-gutters">
                <div class="col-6 mt-2 form-group">
                  <div class="form-check">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-outline-primary active">
                        <input type="radio" name="status" id="public" autocomplete="off" checked>
                        <i class="fas fa-lock-open"></i>
                      </label>
                      <label class="btn btn-outline-primary">
                        <input type="radio" name="status" id="private" autocomplete="off">
                        <i class="fas fa-lock"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-6 mt-2">
                  <button type="button" class="btn btn-primary w-100">登録</button>
                </div>
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