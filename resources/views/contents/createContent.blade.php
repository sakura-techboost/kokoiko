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
            {{-- エラーメッセージ --}}
            @if(count($errors) > 0)
            <div class="container mt-2">
              <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                  <li class="error-alert">{{ $error }}</li>
                @endforeach
              </div>
            </div>
            @endif
            <form action="{{ action('CreateContentController@createContent') }}" method="post" enctype="multipart/form-data">
              @csrf
              {{-- 選択された画像のプレビュー --}}
              <div class="row no-gutters mb-2 preview-box d-none"> 
                
              </div>
              <p class="prvmessage">画像は4つまで選択できます</p>
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="name">名称</label>
                <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name" placeholder="名称　※入力必須" value="{{ old("name") }}">
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="overview">概要</label>
                <textarea rows="6" class="form-control" id="overview" name="overview" placeholder="どんなところ？　※入力必須" value="{{ old("overview") }}"></textarea>
                {{-- <small class="form-text">※タグ付けをすると検索できます</small> --}}
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label" for="placetype_id">登録先</label>
                {{Form::select('placetype_id',Config::get('place.placetype'), old( 'placetype_id' ), ['class' => 'form-control','id' => 'placetype_id'])}}
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label" for="attention_id">関心度</label>
                {{Form::select('attention_id',Config::get('place.attention'), old( 'attention_id' ), ['class' => 'form-control text-warning','id' => 'attention_id'])}}
              </div>
              <!-- オプション入力フォーム -->
              <!-- 住所情報 -->
              <div class="form-group mb-2 address">
                <span class="postalcode">{{ old('postalcode') }}</span><br>
                <span class="pref">{{ old('pref') }}</span><span class="address">{{ old('address') }}</span>
                <input value="{{ old('postalcode') }}" type="text" name="postalcode" class="form-control d-none" id="postalcode" placeholder="郵便番号">
                <label class="col-form-label d-none" for="pref address">住所</label>
                <select class="form-control d-none" name="pref" id="pref">
                  <option value="{{ old('pref') }}"></option>
                </select>
                <input value="{{ old('address') }}" type="text" name="address" class="form-control d-none" id="address" placeholder="市区町村以下">
              </div>
              <!-- 電話番号情報 -->
              <div class="form-group mb-2 phone"> 
                <span>{{ old('phone') }}</span>
                <label class="col-form-label d-none" for="phone">電話番号</label>
                <input value="{{ old('phone') }}" type="text" class="form-control d-none" id="phone" name="phone">
              </div>
              <!-- カテゴリー情報 -->
              <div class="form-group mb-2 category"> 
                <span></span>
                <label class="col-form-label d-none" for="category_id">カテゴリー</label>
                <select class="form-control d-none ctgr" id="category_id" name="category_id" data-selected="{{ old('category_id') }}">
                  <option value="{{ old('category_id') }}"></option>
                </select>               
              </div>
              <!-- ホームページ情報 -->
              <div class="form-group mb-2 url"> 
                <span>{{ old('url') }}</span>
                <label class="col-form-label d-none" for="url">URL</label>
                <input value="{{ old('url') }}" type="text" class="form-control d-none" id="url" name="url">
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
                    <input class="d-none" type="file" name="datafile[]" id="filesend" multiple accept=".jpg,.png">
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
                {{-- 公開非公開のラジオボタン --}}
                <input type="hidden" name="status" id="public" value="1">
<!--
                <div class="col-6 mt-2 form-group">
                  <div class="form-check">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-outline-primary active">
                        <input type="radio" name="status" value="1" autocomplete="off" checked>
                        <i class="fas fa-lock-open"></i>
                      </label>
                      <label class="btn btn-outline-primary">
                        <input type="radio" name="status" value="0" id="private" autocomplete="off">
                        <i class="fas fa-lock"></i>
                      </label>
                    </div>
                  </div>
                </div>
-->
                <div class="col-6 mt-2">
                  <button type="submit" class="btn btn-primary w-100">登録</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

