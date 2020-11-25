{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','プロフィール編集画面')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card mt-5">
        <div class="card-header">
          プロフィール編集
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
          {{-- 更新成功メッセージ --}}
          @if (session('update_profile_success'))
          <div class="container mt-2">
            <div class="alert alert-success">
              {{session('update_profile_success')}}
            </div>
          </div>
          @endif
          <form method="POST" action="{{ action('Admin\UserController@update') }}">
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
                <input type="text" class="form-control-plaintext @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus readonly>
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
                <input type="text" class="form-control-plaintext @error('name') is-invalid @enderror" id="kana" name="kana" value="{{ old('kana',$user->kana) }}" required autocomplete="kana" autofocus readonly>
                @error('kana')
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
                <input type="text" class="form-control-plaintext @error('name') is-invalid @enderror" id="nickname" name="nickname" value="{{ old('nickname',$user->nickname) }}" required autocomplete="nickname" autofocus readonly>
                @error('nickname')
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
                <input type="email" class="form-control-plaintext @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email" readonly>
                @error('email')
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


