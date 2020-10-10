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
            ログイン
          </div>
          <div class="card-body">
            <form>
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
              {{-- ログインボタン --}}
              <button type="submit" class="btn btn-primary d-block mx-auto w-50">ログイン</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection