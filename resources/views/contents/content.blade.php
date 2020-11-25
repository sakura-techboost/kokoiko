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
          <p>{{ $msg }}/5件表示</p>
        </div>
        <div class="col-lg-4 my-2">
<!--          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-secondary active">
              <input type="radio" name="options" id="option1" autocomplete="off" checked>
              全記事
            </label>
            <label class="btn btn-outline-secondary">
              <input type="radio" name="options" id="option2" autocomplete="off">
              マイ記事
            </label>
          </div>
          <a href=# data-toggle="modal" data-target="#search-menu"><i class="fas fa-search" title="検索">検索</i></a>
-->
        </div>
        <div class="col-lg-12 my-2">
          <div class="btn-group d-flex btn-group-toggle nav-btns" data-toggle="buttons">
            <label class="btn w-25 active"  id="eighthGreen">
              <input type="radio" name="switchcontents" value="card-all" id="all-contents" autocomplete="off" checked>
              <span><i class="fas fa-user-edit faa-tada animated-hover" title="記事一覧"></i><span class="d-none d-lg-inline pl-1">記事一覧</span><span>
            </label>
            <label class="btn w-25" id="eighthPink">
              <input type="radio" name="switchcontents" value="card-1" id="fav-contents" autocomplete="off">
              <span><i class="fas fa-heart faa-tada animated-hover" title="お気に入り"></i><span class="d-none d-lg-inline pl-1">お気に入り</span></span>
            </label>
            <label class="btn w-25" id="eighthYellow">
              <input type="radio" name="switchcontents" value="card-2" id="day-contents" autocomplete="off">
              <span><i class="fas fa-star faa-tada animated-hover" title="行ってみたい"></i><span class="d-none d-lg-inline pl-1">行ってみたい</span></span>
            </label>
            <label class="btn w-25" id="eighthBlue">
              <input type="radio" name="switchcontents" value="card-3" id="dis-contents" autocomplete="off">
              <span><i class="fas fa-heart-broken faa-tada animated-hover" title="いまいち"></i><span class="d-none d-lg-inline pl-1">いまいち</span></span>
            </label>
          </div>
        </div>
        <div class="col-lg-12 cards">
          @if(isset($places[0]))
          @foreach ($places as $place)
          <div class="card mb-3 mx-auto mt-3 card-{{ $place->placetype_id }} contents-item">
            <div class="row no-gutters card-header py-1 px-4">
              <p class="d-inline-block col-6">{{ Str::limit($place->name,20) }}<br><small>{{ $place->attentionStar }}</small></p>
              <div class="dropdown d-inline-block col-6" align="right">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('contents.show',[$place->id]) }}">詳細</a>
                  <a class="dropdown-item" href="{{ route('contents.edit',[$place->id]) }}">編集</a>
                  <a class="dropdown-item" href="{{ route('contents.fileEdit',[$place->id]) }}">画像の変更</a>
                  <a class="dropdown-item" href="{{ route('contents.delete',[$place->id]) }}">削除</a>
                </div>
              </div>
            </div>
            <ul class="list-group list-group-flush" >
              <li class="list-group-item w-100 p-0">
                <div class="row no-gutters">
                  <div class="col-sm-4 my-auto mx-auto content-img">
                    {{-- 画像がなければNOIMAGEを表示、あればその画像の一つ目を表示 --}}
                    @if($place->datafile_01 == null)
                    <img src="{{ asset('images/noimage.jpg') }}" class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy">
                    @else
                    <img src="{{ asset("$place->datafile_01") }}" class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy">
                    @endif
                  </div>
                  <div class="col-sm-8">
                    <div class="card-body p-0">
                    <p class="card-text summary" style="border-top: thin solid #d3d3d3">{{ Str::limit($place->overview,500) }}</p>
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
          @else
            <div class="container mt-2">
              <div class="alert alert-success category-null-message">
                場所を登録してみましょう！
              </div>
            </div>
          @endif
          {{ $places->appends(request()->query())->links() }}
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

