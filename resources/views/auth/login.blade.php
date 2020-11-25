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
              @csrf
              {{-- メールアドレス入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="email">メールアドレス(ID)</label>
                <div class="col-lg-7">
                  <input value="{{ old('email')}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              
              {{-- パスワード入力欄 --}}
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-lg-right" for="password">パスワード</label>
                <div class="col-lg-7">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
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
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  パスワードを忘れた方はこちら
                </a>
              @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection