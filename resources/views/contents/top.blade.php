{{-- 共通ヘッダー読み込み --}}
@extends('layouts.topheader')
{{-- ページタイトル埋め込み --}}
@section('title','トップページ')

@section('content')
<div class="container-fluid" >
  <div class="jumbotron" style="background: url({{ asset('images/386392_s.jpg') }}) bottom no-repeat; background-size: cover;">
    <h1>KOKOIKO</h1>
    <p>My favorite places</p>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4 top-message">
      <h5 class="mt-2"><i class="fas fa-heart faa-tada animated mr-2" title="お気に入り"></i>大好きな場所を登録しよう</h5>
      <p class="mb-2">「また行きたい」を覚えておける！</p>
    </div>
    <div class="col-md-6 col-lg-4 top-message">
      <h5 class="mt-2"><i class="fas fa-star faa-tada animated mr-2" title="行ってみたい"></i>気になる場所をリスト化しよう</h5>
      <p class="mb-2">「行ってみたい」を「行ってみよう」に！</p>
    </div>
    <div class="col-md-6 col-lg-4 top-message">
      <h5 class="mt-2"><i class="far fa-lightbulb faa-tada animated mr-2"></i>旅行先で寄り道しちゃおう</h5>
      <p class="mb-2">マップで近くのスポットをピックアップ！</p>
    </div>
<!--
    <div class="col-md-6 col-lg-3 top-message">
      <h5 class="mt-2"><i class="far fa-thumbs-up faa-tada animated mr-2"></i>好きをシェアしよう</h5>
      <p class="mb-2">みんなのお気に入りを見てみよう！</p>
    </div>
  -->
    <div class="col-12 top-message">
      <h5 class="mt-5">さぁ、お出かけしよう！</h5>
    </div>
    <div class="col-md-6 top-message">
      <a href="{{ route('login') }}" class="btn btn-primary d-block mx-auto mt-3 w-50">ログイン</a>
    </div>
    <div class="col-md-6 top-message">
    <a href="{{ route('register') }}" class="btn btn-outline-primary d-block mx-auto mt-3 w-50">新規登録</a>
  </div>
</div>
@endsection


@guest

@endguest
