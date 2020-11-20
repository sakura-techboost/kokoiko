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
              <div class="btn-group d-flex" role="group" aria-label="追加情報入力">
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
