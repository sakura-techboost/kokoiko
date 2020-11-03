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
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group row">
              <label for="email" class="col-lg-4 col-form-label text-lg-right">メールアドレス</label>
              <div class="col-lg-7">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto w-50">
              送信
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
