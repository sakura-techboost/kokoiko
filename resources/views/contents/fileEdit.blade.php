{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','写真編集')

@section('content')
　<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card mt-5">
          <div class="card-header">
            写真を変更する
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
            <form action="{{ route('contents.fileupdate', ['id'=> $id]) }}" method="post" id="file-edit-form" enctype="multipart/form-data">
              @csrf
              {{-- 選択された画像のプレビュー --}}
              <!-- もし元データに画像がなければプレビューボックス非表示 -->
              @if($place_form->datafile_01 == null)
              　<p class="prvmessage">画像を登録してみましょう</p>
              　<p class="prvmessage">画像は4つまで選択できます</p>
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
                  @if(isset($place_form->datafile_02) && $place_form->datafile_03 == null)
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_02") }}">
                    </div>
                  @elseif(isset($place_form->datafile_03) && $place_form->datafile_04 == null)
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_02") }}">
                    </div>
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_03") }}">
                    </div>
                  @elseif(isset($place_form->datafile_04))
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_02") }}">
                    </div>
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_03") }}">
                    </div>
                    <div class="preview col-3">
                      <img class="card-img img-thumbnail rounded d-block" id="preview" src="{{ asset("$place_form->datafile_04") }}">
                    </div>
                  @endif
                </div>
                <p class="prvmessage">画像は4つまで選択できます</p>
              @endif
              <!-- 入力必須データの送信 -->
              <input value="{{ $place_form->name }}" type="text" name="name" class="form-control d-none" id="name">
              <textarea class="form-control d-none" id="overview" name="overview">{{ $place_form->overview }}</textarea>
              <select class="form-control d-none" name="placetype_id" id="pref">
                <option value="{{ $place_form->placetype_id }}"></option>
              </select>
              <select class="form-control d-none" name="attention_id" id="pref">
                <option value="{{ $place_form->attention_id }}"></option>
              </select>
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
