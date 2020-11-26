{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','アカウント登録')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mt-5">
          <div class="card-header">
            アカウント新規登録
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
            <form method="POST" action="{{ route('register') }}">
              @csrf
              {{-- 名前入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="name">名前</label>
                <div class="col-lg-7">
                  <input value="{{ old('name')}}" type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
                </div>
              </div>
              {{-- ニックネーム入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="nickname">ニックネーム(表示名)</label>
                <div class="col-lg-7">
                  <input value="{{ old('nickname')}}" type="text" class="form-control" id="nickname" name="nickname" value="{{ old('nickname') }}" required autofocus>
                </div>
              </div>
              {{-- メールアドレス入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="email">メールアドレス(ID)</label>
                <div class="col-lg-7">
                  <input value="{{ old('email')}}" type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
              </div>
              {{-- パスワード入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="password">パスワード</label>
                <div class="col-lg-7">
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
              </div>
              {{-- パスワード確認入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="password-confirm">パスワード再入力</label>
                <div class="col-lg-7">
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
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
