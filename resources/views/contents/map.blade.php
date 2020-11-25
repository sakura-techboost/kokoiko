{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','エリアで表示')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 mt-5">        
        <div class="row">
          <div class="col-lg-8 my-2">
            <p>1北海道/札幌市(的な指定されたエリアのパンくずリスト)</p>
            <p>{{ $msg }}表示</p>
          </div>
<!-- 
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
        -->
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
          <div class="col-lg-12">
            <div class="row">
              @if(isset($places[0]))
              <!-- 近くのスポットのカード一覧 -->
              <!-- 画面幅992px以上の場合のナビゲーションバー -->
              <div class="col-lg-4">
                <ul class="nav lg-nav" style="border: thin solid #8d7e7e">
                  @foreach ($places as $place)
                  <li class="nav-item" value="{{ $place->pref }}{{ $place->address }}">
                    <a class="card mb-3 mx-auto card-{{ $place->placetype_id }}" href="{{ route('contents.show',[$place->id]) }}">
                      <div class="row no-gutters card-header py-1 px-2">
                        <p class="d-inline-block col-6" style="font-size:11px;">{{ Str::limit($place->name,14) }}</p>
                        <p class="d-inline-block col-6 align-self-center" align="right">
                          <small>{{ $place->attentionStar }}</small>
                        </p>
                      </div>
                      <ul class="list-group list-group-flush" >
                        <li class="list-group-item w-100 p-0">
                          <div class="row no-gutters">
                            <div class="col-4 my-auto mx-auto">
                              {{-- 画像がなければNOIMAGEを表示、あればその画像の一つ目を表示 --}}
                              @if($place->datafile_01 == null)
                              <img src="{{ asset('images/noimage.jpg') }}" class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy">
                              @else
                              <img src="{{ asset("$place->datafile_01") }}" class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy">
                              @endif
                            </div>
                            <div class="col-8">
                              <div class="card-body p-0">
                                <p class="card-text summary">{{ Str::limit($place->overview,15) }}</p>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </a>
                  </li>
                  @endforeach
                </ul>
                <!-- 画面幅が992px以下の場合のナビゲーションバー -->
                <ul class="nav d-lg-none md-nav w-100" style="border: thin solid #d3d3d3">
                  @foreach ($places as $place)
                  <li class="nav-item md-item map-card" value="{{ $place->pref }}{{ $place->address }}">
                    <a class="card h-100 mx-2 card-{{ $place->placetype_id }}" href="{{ route('contents.show',[$place->id]) }}">
                      <div class="row no-gutters card-header py-1 px-4">
                        <p class="d-inline-block col-6 small-card">{{ Str::limit($place->name,16) }}</p>
                        <p class="d-inline-block col-6 align-self-center" align="right">
                          <small>{{ $place->attentionStar }}</small>
                        </p>
                      </div>
                      <ul class="list-group list-group-flush" >
                        <li class="list-group-item w-100 p-0">
                          <div class="row no-gutters">
                            <div class="col-4 my-auto mx-auto thumb-img">
                              {{-- 画像がなければNOIMAGEを表示、あればその画像の一つ目を表示 --}}
                              @if($place->datafile_01 == null)
                              <img src="{{ asset('images/noimage.jpg') }}" class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy">
                              @else
                              <img src="{{ asset("$place->datafile_01") }}" class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy">
                              @endif
                            </div>
                            <div class="col-8">
                              <div class="card-body p-0">
                                <p class="card-text summary">{{ Str::limit($place->overview,15) }}</p>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- Googlemap表示位置を指定 -->
              <div class="col-lg-8" style="height: 66vw; max-height: 395px;">
                <iframe 
                  class="other"
                  src="https://maps.google.co.jp/maps?output=embed&q={{ $place->pref }}"
                  width="100%"
                  height="100%"
                  frameborder="0"
                  style="border:0"
                  allowfullscreen
                >
                </iframe>
              </div>
              @else
              <div class="container mt-2">
                <div class="alert alert-success category-null-message">
                  住所を登録してみましょう！
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

