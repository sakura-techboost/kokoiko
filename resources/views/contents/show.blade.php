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
                        <img class="card-img img-thumbnail rounded mx-auto d-block w-100" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
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
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">HP</span>
                </p>
                <p class="card-text d-inline-block col-9 px-1 py-0">
                  <span style="font-size: small">URL～～～～～～～</span>
                </p>
              </div>
            </li>
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters">
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">住所</span>
                </p>
                <p class="card-text d-inline-block col-9 px-1 py-0">
                  <span style="font-size: small">北海道札幌市~</span>
                </p>
              </div>
            </li>
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters">
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">電話番号</span>
                </p>
                <p class="card-text d-inline-block col-9 px-1 py-0">
                  <span style="font-size: small">09009009090</span>
                </p>
              </div>
            </li>
            <li class="list-group-item w-100 p-0">
              <div class="row no-gutters">
                <p class="card-text d-inline-block col-3 px-1 py-0" style="border-right: thin solid #d3d3d3">
                  <span style="font-size: small">カテゴリー</span>
                </p>
                <p class="card-text d-inline-block col-9 px-1 py-0">
                  <span style="font-size: small">グルメ　スイーツ</span>
                </p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

@endsection