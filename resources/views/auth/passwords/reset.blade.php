@extends('layouts.header')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card mt-5">
        <div class="card-header">
          パスワードの再設定
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group row">
              <label for="email" class="col-lg-4 col-form-label text-lg-right">メールアドレス</label>
              <div class="col-lg-7">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-lg-4 col-form-label text-lg-right">{{ __('Password') }}</label>
              <div class="col-lg-7">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password-confirm" class="col-lg-4 col-form-label text-lg-right">{{ __('Confirm Password') }}</label>
              <div class="col-lg-7">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto w-50">
              パスワードをリセットする
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
