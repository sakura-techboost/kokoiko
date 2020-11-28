{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','ログイン')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mt-5">
          <div class="card-header">
            ログイン
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">

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

              @csrf
              
              {{-- メールアドレス入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="email">メールアドレス(ID)</label>
                <div class="col-lg-7">
                  <input value="{{ old('email')}}" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
              </div>
              
              {{-- パスワード入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="password">パスワード</label>
                <div class="col-lg-7">
                  <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                </div>
              </div>
              <!-- ログインを維持する機能 -->
              <div class="form-group row">
                <div class="col-lg-6 offset-lg-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label d-none" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>
              
              {{-- ログインボタン --}}
              <button type="submit" class="btn btn-primary d-block mx-auto w-50">ログイン</button>
              <!-- パスワードを忘れた時の処理 -->
<!--
              if (Route::has('password.request'))
                <a class="btn btn-link" href=" route('password.request') }}">
                  パスワードを忘れた方はこちら
                </a>
              endif
              -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection