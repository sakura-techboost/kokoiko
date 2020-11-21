{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','マイページ')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12 mt-5">
      {{-- 投稿成功メッセージ --}}
      @if (session('create_content_success'))
      <div class="container mt-2">
        <div class="alert alert-success">
          {{session('create_content_success')}}
        </div>
      </div>
      @endif
      {{-- 編集成功メッセージ --}}
      @if (session('edit_content_success'))
          <div class="container mt-2">
            <div class="alert alert-success">
              {{session('edit_content_success')}}
            </div>
          </div>
          @endif
      {{-- 削除成功メッセージ --}}
      @if (session('delete_content_success'))
      <div class="container mt-2">
        <div class="alert alert-success">
          {{session('delete_content_success')}}
        </div>
      </div>
      @endif
      <div class="row">
        <div class="col-lg-8 my-2">
          <p>1北海道/札幌市(的な指定されたエリアのパンくずリスト)</p>
          <p>全10件</p>
        </div>
        <div class="col-lg-4 my-2">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-secondary active">
              <input type="radio" name="options" id="option1" autocomplete="off" checked>
              全記事
            </label>
            <label class="btn btn-outline-secondary">
              <input type="radio" name="options" id="option2" autocomplete="off">
              マイ記事
            </label>
          </div>
        </div>
        <div class="col-lg-12 my-2">
          <div class="btn-group d-flex btn-group-toggle nav-btns" data-toggle="buttons">
            <label class="btn w-25 active"  id="eighthGreen">
              <input type="radio" name="switchcontents" id="all-contents" autocomplete="off" checked>
              <span><i class="fas fa-user-edit faa-tada animated-hover" title="記事一覧"></i><span class="d-none d-lg-inline pl-1">記事一覧</span><span>
            </label>
            <label class="btn w-25" id="eighthPink">
              <input type="radio" name="switchcontents" id="option2" autocomplete="off">
              <span><i class="fas fa-heart faa-tada animated-hover"　title="お気に入り"></i><span class="d-none d-lg-inline pl-1">お気に入り</span></span>
            </label>
            <label class="btn w-25" id="eighthYellow">
              <input type="radio" name="switchcontents" id="option2" autocomplete="off">
              <span><i class="fas fa-star faa-tada animated-hover" title="行ってみたい"></i><span class="d-none d-lg-inline pl-1">行ってみたい</span></span>
            </label>
            <label class="btn w-25" id="eighthBlue">
              <input type="radio" name="switchcontents" id="option2" autocomplete="off">
              <span><i class="fas fa-heart-broken faa-tada animated-hover" title="いまいち"></i><span class="d-none d-lg-inline pl-1">いまいち</span></span>
            </label>
          </div>
        </div>
        <div class="col-lg-12">
          @foreach ($places as $place)
          <div class="card mb-3 mx-auto mt-3">
            <div class="row no-gutters card-header py-1 px-4">
              <p class="d-inline-block col-6">{{ Str::limit($place->name,10) }}<br><small>{{ $place->attentionStar }}</small></p>
              <div class="dropdown d-inline-block col-6" align="right">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('contents.show',[$place -> id]) }}">詳細</a>
                  <a class="dropdown-item" href="{{ route('contents.edit',[$place -> id]) }}">編集</a>
                  <a class="dropdown-item" href="{{ route('contents.fileEdit',[$place -> id]) }}">画像の変更</a>
                  <a class="dropdown-item" href="{{ route('contents.delete',[$place -> id]) }}">削除</a>
                </div>
              </div>
            </div>
            <ul class="list-group list-group-flush" >
              <li class="list-group-item w-100 p-0">
                <div class="row no-gutters">
                  <div class="col-sm-4 my-auto mx-auto">
                    {{-- 画像がなければNOIMAGEを表示、あればその画像の一つ目を表示 --}}
                    @if($place->datafile_01 == null)
                    <img src="{{ asset('images/noimage.jpg') }}" class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy">
                    @else
                    <img src="{{ asset("$place->datafile_01") }}" class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy">
                    @endif
                  </div>
                  <div class="col-sm-8">
                    <div class="card-body p-0">
                    <p class="card-text summary" style="border-top: thin solid #d3d3d3">{{ Str::limit($place->overview,15) }}</p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item w-100 p-0">
                <div class="row no-gutters">
                  <p class="card-text city d-inline-block col-4 p-1" style="border-right: thin solid #d3d3d3">
                    @if($place->pref == null)
                      <span style="font-size: small">都道府県未登録</span>
                    @else
                      <span style="font-size: small">{{ $place->pref }}</span>
                    @endif
                  </p>
                  <p class="card-text city d-inline-block col-4 p-1" style="border-right: thin solid #d3d3d3">
                    <span style="font-size: small">{{ $place->placeType }}</span>
                  </p>
                  <p class="card-text category d-inline-block col-4 p-1">
                    @if($place->category_id == null)
                      <span style="font-size: small">カテゴリー未選択</span>
                    @else
                      <span style="font-size: small">{{ $place->category }}</span>
                    @endif
                  </p>
                </div>
              </li>
            </ul>
          </div>                        
          @endforeach
          {{ $places->links() }}
          <div class="card mb-3 mx-auto mt-3">
            <div class="row no-gutters card-header py-1 px-4">
              <p class="d-inline-block col-6">タイトル<br><small>★★★★★</small></p>
              <p class="d-inline-block col-6 align-self-center" align="right">
                <button type="button" class="btn" data-toggle="modal" data-target="#content-menu">
                <i class="fas fa-ellipsis-h"></i>
                </button>
              </p>
            </div>
            <ul class="list-group list-group-flush" >
              <li class="list-group-item w-100 p-0">
                <div class="row no-gutters">
                  <div class="col-sm-4 my-auto mx-auto">
                    <img class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                  </div>
                  <div class="col-sm-8">
                    <div class="card-body p-0">
                      <p class="card-text summary" style="border-top: thin solid #d3d3d3">概要</p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item w-100 p-0">
                <div class="row no-gutters">
                  <p class="card-text city d-inline-block col-4 p-1" style="border-right: thin solid #d3d3d3">
                    <span style="font-size: small">都道府県</span>
                  </p>
                  <p class="card-text city d-inline-block col-4 p-1" style="border-right: thin solid #d3d3d3">
                    <span style="font-size: small">市区町村</span>
                  </p>
                  <p class="card-text category d-inline-block col-4 p-1">
                    <span style="font-size: small">カテゴリ</span>
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('js')
  <script src="{{ secure_asset('js/content.js') }}" defer></script>
@endsection
