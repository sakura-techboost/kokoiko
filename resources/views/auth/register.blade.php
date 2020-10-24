{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','アカウント登録')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card mt-5">
          <div class="card-header">
            アカウント新規登録
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              {{-- 名前入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="name">名前</label>
                <div class="col-md-5">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              {{-- ふりがな入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="kana">ふりがな</label>
                <div class="col-md-5">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="kana" name="kana" value="{{ old('kana') }}" required autocomplete="kana" autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              {{-- ニックネーム入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="nickname">ニックネーム(表示名)</label>
                <div class="col-md-5">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="nickname" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              {{-- メールアドレス入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="email">メールアドレス(ID)</label>
                <div class="col-md-5">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              {{-- パスワード入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="password">パスワード</label>
                <div class="col-md-5">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              {{-- パスワード確認入力欄 --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right" for="password-confirm">パスワード再入力</label>
                <div class="col-md-5">
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
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
