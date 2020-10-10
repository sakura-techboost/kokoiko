{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','アカウント登録')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            アカウント新規登録
          </div>
          <div class="card-body">
            <form>
              {{-- 名前入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="userName">名前</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="userName">
                </div>
              </div>
              {{-- ふりがな入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="userKanaName">ふりがな</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="userKanaName">
                </div>
              </div>
              {{-- ニックネーム入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="userNickname">ニックネーム(表示名)</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="userNickname">
                </div>
              </div>
              {{-- 電話番号入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="phoneNumber">電話番号</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="phoneNumber">
                </div>
              </div>
              {{-- メールアドレス入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="email">メールアドレス(ID)</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="email">
                </div>
              </div>
              {{-- パスワード入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="password">パスワード</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="password">
                </div>
              </div>
              {{-- パスワード確認入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="password2">パスワード再入力</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="password2">
                </div>
              </div>
              {{-- 登録ボタン --}}
              <button type="submit" class="btn btn-primary d-block mx-auto w-50">登録</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

