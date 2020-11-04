@extends('layouts.header')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card mt-5">
        <div class="card-header">
          パスワードの再設定
        </div>
        
        {{-- エラーメッセージ --}}
        @if(count($errors) > 0)
        <div class="container mt-2">
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </div>
        </div>
        @endif

        {{-- 更新成功メッセージ --}}
        @if (session('update_password_success'))
        <div class="container mt-2">
          <div class="alert alert-success">
            {{session('update_password_success')}}
          </div>
        </div>
        @endif

        <div class="card-body">
          <form method="POST" action="{{ action('Admin\UserController@updatePassword') }}">
            @csrf
            <div class="form-group row">
              <label for="current" class="col-lg-4 col-form-label text-lg-right">現在のパスワード</label>
              <div class="col-lg-7">
                <input id="current" type="password" class="form-control" name="current-password" required autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-lg-4 col-form-label text-lg-right">新しいパスワード</label>
              <div class="col-lg-7">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="new-password" required autofocus>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password-confirm" class="col-lg-4 col-form-label text-lg-right">新しいパスワード(確認)</label>
              <div class="col-lg-7">
                <input id="password-confirm" type="password" class="form-control" name="new-password_confirmation" required autofocus>
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
