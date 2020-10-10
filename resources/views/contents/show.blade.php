{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','詳細画面')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            お気に入り
          </div>
          <div class="card-body">
            <div class="row no-gutters">
              <div class="col-7 mx-auto">
                <h5 class="card-title d-inline-block">名称</h5>
              </div>
              <div class="col-3 mx-auto">
                <p class="card-subtitle">関心度</p>
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-12 mx-auto">
              　<img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-12 mx-auto">
              　<p class="card-text">概要</p>
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-3 mx-auto">
              　<p class="card-text">概要</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection