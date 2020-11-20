{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','記事編集')

@section('content')
　<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card mt-5">
          <div class="card-header">
            記事を編集する
          </div>
          <div class="card-body">
            {{-- エラーが発生したら以下に表示 --}}
            @if (count($errors) > 0)
              <ul>
                @foreach($errors->all() as $e)
                  <li>{{ $e }}</li>
                @endforeach
              </ul>
            @endif
            <form action="{{ route('contents.update', ['id'=> $id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{-- 選択された画像のプレビュー --}}
              <!-- もし元データに画像がなければプレビューボックス非表示 -->
              @if($place_form->datafile_01 == null)
                <div class="row no-gutters mb-2 preview-box d-none"> 
                  
                </div>
              <!-- もし元データに画像があばプレビューボックスと画像を表示 -->
              @elseif(isset($place_form->datafile_01))
                {{-- 変更された画像のプレビュー --}}
                <div class="row no-gutters mb-2 preview-box d-none"> 
                  
                </div>
                <!-- 元データの画像のプレビュー -->
                <div class="row no-gutters mb-2 edit-preview-box"> 
                  <div class="preview col-3">
                    <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_01") }}">
                  </div>
                  @if(isset($place_form->datafile_02))
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_02") }}">
                    </div>
                  @elseif(isset($place_form->datafile_03))
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_03") }}">
                    </div>
                  @elseif(isset($place_form->datafile_04))
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_04") }}">
                    </div>
                  @endif
                </div>
              @endif
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="name">名称</label>
                <input value="{{ $place_form->name }}" type="text" class="form-control" id="name" name="name" placeholder="名称">
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="overview">概要</label>
                <textarea class="form-control" id="overview" name="overview" placeholder="どんなところ？">{{ $place_form->overview }}</textarea>
                {{-- <small class="form-text">※タグ付けをすると検索できます</small> --}}
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label" for="placetype_id">登録先</label>
                {{Form::select('placetype_id',['1'=>'お気に入り','2'=>'行ってみたい','3'=>'いまいち'], ( $place_form->placetype_id ), ['class' => 'form-control','id' => 'form-control'])}}
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label" for="attention_id">関心度</label>
                <select class="form-control text-warning" id="attention_id" name="attention_id">
                  @foreach(config('place.attention') as $index => $value)
                    <option value="{{ $index }}" @if($place_form->attention_id == $index) selected @endif>{{ $value }}</option>
                  @endforeach
                </select>
              </div>
              <!-- オプション入力フォーム -->
              <!-- 住所情報 -->
              <div class="form-group mb-2 address">
                <span class="postalcode">{{ $place_form->postalcode }}</span><br>
                <span class="pref">{{ $place_form->pref }}</span><span class="address">{{ $place_form->address }}</span>
                <input type="text" name="postalcode" class="form-control d-none" id="postalcode" placeholder="郵便番号">
                <label class="col-form-label d-none" for="pref address">住所</label>
                <select class="form-control d-none" name="pref" id="pref">
                  <option value="{{ $place_form->pref }}"></option>
                </select>
                <input value="{{ $place_form->address }}" type="text" name="address" class="form-control d-none" id="address" placeholder="市区町村以下">
              </div>
              <!-- 電話番号情報 -->
              <div class="form-group mb-2 phone"> 
                <span>{{ $place_form->phone }}</span>
                <label class="col-form-label d-none" for="phone">電話番号</label>
                <input value="{{ $place_form->phone }}" type="text" class="form-control d-none" id="phone" name="phone">
              </div>
              <!-- カテゴリー情報 -->
              <div class="form-group mb-2 category"> 
                <span>{{ $place_form->category }}</span>
                <label class="col-form-label d-none" for="category_id">カテゴリー</label>
                <select class="form-control d-none" id="category_id" name="category_id">
                  <option value="{{ $place_form->category_id }}"></option>
                </select>
              </div>
              <!-- ホームページ情報 -->
              <div class="form-group mb-2 url"> 
                <span></span>
                <label class="col-form-label d-none" for="url">URL</label>
                <input value="{{ $place_form->url }}" type="text" class="form-control d-none" id="url" name="url">
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
                    <input value="{{ $place_form->datafile }}" class="d-none" type="file" name="datafile[]" id="filesend" multiple accept=".jpg,.png">
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

@section('js')
      <script src="{{ secure_asset('js/content.js') }}" defer></script>
@endsection