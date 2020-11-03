{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','マイページ')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card mt-5">
        <div class="card-header">
          プロフィール編集
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            {{-- 名前 --}}
            <div class="form-group row">
              <label class="col-lg-4 col-form-label text-lg-right" for="name">名前</label>
              <label class="col-form-label col-lg-1 col-1" for="icon">
                <a data-toggle="modal" href="#edit-name">
                  <i class="fas fa-edit"></i>
                </a>
              </label>
              <div class="col-lg-7 col-7">
                <input type="text" class="form-control-plaintext @error('name') is-invalid @enderror" id="name" name="name" value="名前" required autocomplete="name" autofocus readonly>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            {{-- ふりがな --}}
            <div class="form-group row">
              <label class="col-lg-4 col-form-label text-lg-right" for="kana">ふりがな</label>
              <label class="col-form-label col-lg-1 col-1" for="icon">
                <a data-toggle="modal" href="#edit-kana">
                  <i class="fas fa-edit"></i>
                </a>
              </label>
              <div class="col-lg-7 col-7">
                <input type="text" class="form-control-plaintext @error('name') is-invalid @enderror" id="kana" name="kana" value="カナ" required autocomplete="kana" autofocus readonly>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            {{-- ニックネーム --}}
            <div class="form-group row">
              <label class="col-lg-4 col-form-label text-lg-right" for="nickname">ニックネーム(表示名)</label>
              <label class="col-form-label col-lg-1 col-1" for="icon">
                <a data-toggle="modal" href="#edit-nickname">
                  <i class="fas fa-edit"></i>
                </a>
              </label>
              <div class="col-lg-7 col-7">
                <input type="text" class="form-control-plaintext @error('name') is-invalid @enderror" id="nickname" name="nickname" value="ニックネーム" required autocomplete="nickname" autofocus readonly>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            {{-- メールアドレス --}}
            <div class="form-group row">
              <label class="col-lg-4 col-form-label text-lg-right" for="email">メールアドレス(ID)</label>
              <label class="col-form-label col-lg-1 col-1" for="icon">
                <a data-toggle="modal" href="#edit-email">
                  <i class="fas fa-edit"></i>
                </a>
              </label>
              <div class="col-lg-7 col-7">
                <input type="email" class="form-control-plaintext @error('email') is-invalid @enderror" id="email" name="email" value="a@yahoo.co.jp" required autocomplete="email" readonly>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            {{-- パスワード --}}
            <div class="form-group row">
              <label class="col-lg-4 col-form-label text-lg-right" for="password">パスワード</label>
              <label class="col-form-label col-lg-1 col-1" for="icon">
                <a data-toggle="modal" href="#edit-pass">
                  <i class="fas fa-edit"></i>
                </a>
              </label>
              <div class="col-lg-7 col-7">
                <input type="password" class="form-control-plaintext @error('password') is-invalid @enderror" id="password" name="password" value="********" required autocomplete="new-password" readonly>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            {{-- 保存ボタン --}}
            <button type="submit" class="btn btn-primary d-block mx-auto w-50">保存</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


