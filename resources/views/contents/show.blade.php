{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','詳細画面')

@section('content')
   <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card mx-auto mt-5">
          <div class="row no-gutters card-header py-1 px-4">
            <p class="d-inline-block col-9">{{ $place->name }}<br><small>{{ $place->placetype_id }}</small></p>
            <div class="dropdown d-inline-block col-3" align="right">
              <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                <i class="fas fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('contents.edit',[$place -> id]) }}">編集</a>
                <a class="dropdown-item" href="#!">削除</a>
              </div>
            </div>
          </div>
          <ul class="list-group list-group-flush" >
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters">
                <div class="col-sm-4 my-auto mx-auto">
                  {{-- 画像がなければNOIMAGEを表示、あればその画像を表示 --}}
                  @if($place->datafile == null)
                  <img src="{{ asset('images/noimage.jpg') }}" class="card-img img-thumbnail rounded mx-auto d-block w-100" loading="lazy">
                  @else
                <!-- 登録した画像をカルーセル表示する -->
                  <div class="carousel slide" id="cl" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#cl" data-slide-to="0" class="active"></li>
                      <li data-target="#cl" data-slide-to="1"></li>
                      <li data-target="#cl" data-slide-to="2"></li>
                      <li data-target="#cl" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="card-img img-thumbnail rounded mx-auto d-block w-100" loading="lazy" src="{{ asset("public/images/$place->datafile") }}">
                      </div>
                      <div class="carousel-item">
                        <img class="card-img img-thumbnail rounded mx-auto d-block w-100" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                      </div>
                      <div class="carousel-item">
                        <img class="card-img img-thumbnail rounded mx-auto d-block w-100" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                      </div>
                      <div class="carousel-item">
                        <img class="card-img img-thumbnail rounded mx-auto d-block w-100" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                      </div>
                    </div>
                    <a href="#cl" class="carousel-control-prev" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                      <span class="sr-only">前の画像へ</span>
                    </a>
                    <a href="#cl" class="carousel-control-next" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                      <span class="sr-only">次の画像へ</span>
                    </a>
                  </div>
                  @endif
                </div>
                <div class="col-sm-8">
                  <div class="card-body p-0">
                    <p class="card-text summary" style="border-top: thin solid #d3d3d3">{{ $place->overview }}</p>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters">
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">HP</span>
                </p>
                <p class="card-text d-inline-block col-9 px-1 py-0">
                  <span style="font-size: small">{{ $place->url }}</span>
                </p>
              </div>
            </li>
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters">
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">住所</span>
                </p>
                <p class="card-text d-inline-block col-9 px-1 py-0">
                  <span style="font-size: small">{{ $place->pref }} {{ $place->address }}</span>
                </p>
              </div>
            </li>
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters">
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">電話番号</span>
                </p>
                <p class="card-text d-inline-block col-9 px-1 py-0">
                  <span style="font-size: small">{{ $place->phone }}</span>
                </p>
              </div>
            </li>
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters">
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">カテゴリー</span>
                </p>
                <p class="card-text d-inline-block col-9 px-1 py-0">
                  <span style="font-size: small">{{ $place->category_id }}</span>
                </p>
              </div>
            </li>
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters h-50">
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">地図</span>
                </p>
                <div class="col-9 px-1 py-0" style="background: #BFA; height: 75vw; max-height: 395px;">
                  Googlemap
                </div>
              </div>
            </li>
          </ul>
        </div> 
      </div>

        <!-- 近くのスポットを地図とともに表示 -->
      <div class="col-lg-12 mb-5">
        <h3 class="mt-5">この近くのスポットを見る</h3>
        <p　class="m-3">1~20件表示/全50件</p>
        <div class="row">
          <!-- 近くのスポットのカード一覧 -->
          <div class="col-lg-4">
            <!-- 画面幅が992px以上の場合のナビゲーションバー -->
            <ul class="nav lg-nav" style="border: thin solid #d3d3d3">
              <li class="nav-item">
                <a class="card mb-3 mx-auto" href="#">
                  <div class="row no-gutters card-header py-1 px-4">
                    <p class="d-inline-block col-6">タイトル</p>
                    <p class="d-inline-block col-6 align-self-center" align="right">
                      <small>★★★★★</small>
                    </p>
                  </div>
                  <ul class="list-group list-group-flush" >
                    <li class="list-group-item w-100 p-0">
                      <div class="row no-gutters">
                        <div class="col-4 my-auto mx-auto">
                          <img class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                        </div>
                        <div class="col-8">
                          <div class="card-body p-0">
                            <p class="card-text summary">概要</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </a>
              </li>
              <li class="nav-item">
                <a class="card mb-3 mx-auto" href="#">
                  <div class="row no-gutters card-header py-1 px-4">
                    <p class="d-inline-block col-6">タイトル</p>
                    <p class="d-inline-block col-6 align-self-center" align="right">
                      <small>★★★★★</small>
                    </p>
                  </div>
                  <ul class="list-group list-group-flush" >
                    <li class="list-group-item w-100 p-0">
                      <div class="row no-gutters">
                        <div class="col-4 my-auto mx-auto">
                          <img class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                        </div>
                        <div class="col-8">
                          <div class="card-body p-0">
                            <p class="card-text summary">概要</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </a>
              </li>
              <li class="nav-item">
                <a class="card mb-3 mx-auto" href="#">
                  <div class="row no-gutters card-header py-1 px-4">
                    <p class="d-inline-block col-6">タイトル</p>
                    <p class="d-inline-block col-6 align-self-center" align="right">
                      <small>★★★★★</small>
                    </p>
                  </div>
                  <ul class="list-group list-group-flush" >
                    <li class="list-group-item w-100 p-0">
                      <div class="row no-gutters">
                        <div class="col-4 my-auto mx-auto">
                          <img class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                        </div>
                        <div class="col-8">
                          <div class="card-body p-0">
                            <p class="card-text summary">概要</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </a>
              </li>
              <li class="nav-item">
                <a class="card mb-3 mx-auto" href="#">
                  <div class="row no-gutters card-header py-1 px-4">
                    <p class="d-inline-block col-6">タイトル</p>
                    <p class="d-inline-block col-6 align-self-center" align="right">
                      <small>★★★★★</small>
                    </p>
                  </div>
                  <ul class="list-group list-group-flush" >
                    <li class="list-group-item w-100 p-0">
                      <div class="row no-gutters">
                        <div class="col-4 my-auto mx-auto">
                          <img class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                        </div>
                        <div class="col-8">
                          <div class="card-body p-0">
                            <p class="card-text summary">概要</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </a>
              </li>
            </ul>
            <!-- 画面幅が992px以下の場合のナビゲーションバー -->
            <ul class="nav d-lg-none md-nav" style="border: thin solid #d3d3d3">
              <li class="nav-item">
                <a class="card h-100 mx-2" href="#">
                  <div class="row no-gutters card-header py-1 px-4">
                    <p class="d-inline-block col-6">タイトル</p>
                    <p class="d-inline-block col-6 align-self-center" align="right">
                      <small>★★★★★</small>
                    </p>
                  </div>
                  <ul class="list-group list-group-flush" >
                    <li class="list-group-item w-100 p-0">
                      <div class="row no-gutters">
                        <div class="col-4 my-auto mx-auto">
                          <img class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                        </div>
                        <div class="col-8">
                          <div class="card-body p-0">
                            <p class="card-text summary">概要</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </a>
              </li>
              <li class="nav-item">
                <a class="card h-100 mx-2" href="#">
                  <div class="row no-gutters card-header py-1 px-4">
                    <p class="d-inline-block col-6">タイトル</p>
                    <p class="d-inline-block col-6 align-self-center" align="right">
                      <small>★★★★★</small>
                    </p>
                  </div>
                  <ul class="list-group list-group-flush" >
                    <li class="list-group-item w-100 p-0">
                      <div class="row no-gutters">
                        <div class="col-4 my-auto mx-auto">
                          <img class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                        </div>
                        <div class="col-8">
                          <div class="card-body p-0">
                            <p class="card-text summary" style="border-top: thin solid #d3d3d3">概要</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </a>
              </li>
            </ul>
          </div>
          <!-- Googlemap表示位置を指定 -->
          <div class="col-lg-8" style="background: #BFA; height: 66vw; max-height: 395px;">
            Googlemap
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection