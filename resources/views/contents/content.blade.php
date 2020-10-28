{{-- 共通ヘッダー読み込み --}}
@extends('layouts.header')
{{-- ページタイトル埋め込み --}}
@section('title','マイページ')

@section('content')

  <div class="maincontents">
    <div class="navigation">
      {{-- お気に入り・行ってみたい・いまいちのタブ形式ナビゲーション --}}
      <ul class="nav nav-tabs bg-white">
        　　<li class="nav-item" id="eighthGreen">
        　<a href="#all" class="nav-link active" data-toggle="tab" >
            <i class="fas fa-user-edit" title="マイ記事一覧"></i><span class="d-none d-lg-inline pl-1">マイ記事一覧</span>
        　</a>
        </li>
        <li class="nav-item" id="eighthPink">
          <a href="#favorite" class="nav-link" data-toggle="tab">
              <i class="fas fa-heart faa-tada animated-hover"　title="お気に入り"></i><span class="d-none d-lg-inline pl-1">お気に入り</span>
          </a>
        </li>
        <li class="nav-item" id="eighthYellow">
          <a href="#someday" class="nav-link" data-toggle="tab">
              <i class="fas fa-star faa-tada animated-hover" title="行ってみたい"></i><span class="d-none d-lg-inline pl-1">行ってみたい</span>
          </a>
        </li>
        <li class="nav-item" id="eighthBlue">
          <a href="#disliked" class="nav-link" data-toggle="tab" >
              <i class="fas fa-heart-broken faa-tada animated-hover" title="いまいち"></i><span class="d-none d-lg-inline pl-1">いまいち</span>
          </a>
        </li>
      </ul>
        {{-- タブの中身 --}}  
      <div class="tab-content">
        <div class="tab-pane fade" id="all">
          <div class="row">
            <div class="col-lg-6">
              <div class="card mb-3 mx-auto" style="min-width: 318px">
                <div class="row no-gutters card-header">
                  <p class="d-inline-block col-6">タイトル</p>
                  <p class="d-inline-block col-6" align="right">★★★★★</p>
                </div>
                <div class="row no-gutters">
                  <div class="col-sm-4 my-auto mx-auto">
                    <img class="card-img img-thumbnail rounded mx-auto d-block" loading="lazy" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                  </div>
                  <div class="col-sm-8">
                    <div class="card-body">
                      
                      <div class="row line2 h-15">
                        <p class="card-text city d-inline-block col-6">都道府県</p>
                        <p class="card-text category d-inline-block col-6">カテゴリ</p>
                      </div>
                      <div class="row line3 h-65">
                        <p class="card-text summary d-block col-12">概要</p>
                      </div>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card mb-3 mx-auto" style="min-width: 318px">
                <div class="row no-gutters">
                  <div class="col-md-4 my-auto">
                    <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <div class="row line1 h-20">
                        <h5 class="card-title d-inline-block col-6">タイトル</h5>
                        <p class="card-subtitle d-inline-block col-6">★★★★★</p>
                      </div>
                      <div class="row line2 h-15">
                        <p class="card-text city d-inline-block col-6">都道府県</p>
                        <p class="card-text category d-inline-block col-6">カテゴリ</p>
                      </div>
                      <div class="row line3 h-65">
                        <p class="card-text summary d-block col-12">概要</p>
                      </div>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card mb-3 mx-auto" style="min-width: 318px">
                <div class="row no-gutters">
                  <div class="col-md-4 my-auto">
                    <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <div class="row line1 h-20">
                        <h5 class="card-title d-inline-block col-6">タイトル</h5>
                        <p class="card-subtitle d-inline-block col-6">★★★★★</p>
                      </div>
                      <div class="row line2 h-15">
                        <p class="card-text city d-inline-block col-6">都道府県</p>
                        <p class="card-text category d-inline-block col-6">カテゴリ</p>
                      </div>
                      <div class="row line3 h-65">
                        <p class="card-text summary d-block col-12">概要</p>
                      </div>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card mb-3 mx-auto" style="min-width: 318px">
                <div class="row no-gutters">
                  <div class="col-md-4 my-auto">
                    <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <div class="row line1 h-20">
                        <h5 class="card-title d-inline-block col-6">タイトル</h5>
                        <p class="card-subtitle d-inline-block col-6">★★★★★</p>
                      </div>
                      <div class="row line2 h-15">
                        <p class="card-text city d-inline-block col-6">都道府県</p>
                        <p class="card-text category d-inline-block col-6">カテゴリ</p>
                      </div>
                      <div class="row line3 h-65">
                        <p class="card-text summary d-block col-12">概要</p>
                      </div>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
          
    　  <div class="tab-pane fade show active" id="favorite">
          <a class="card mb-3 btn" href="#">
            <div class="row no-gutters">
              <div class="col-4 mx-auto">
            　　<img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
              </div>
              <div class="col-8">
     　　         <div class="card-body">
                  <div class="row">
                    <h5 class="card-title d-inline-block col-6">タイトル</h5>
                    <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
                  </div>
                  <div class="row">
                    <p class="card-text place d-inline-block col-6">都道府県</p>
                    <p class="card-text category d-inline-block col-6">カテゴリ</p>
                  </div>
               　  <div class="row">
            　       <p class="card-text summary d-block col-12">概要</p>
               　  </div>
                </div>
              </div>
          　</div>
          </a>
          <a class="card mb-3 btn" href="#">
            <div class="row no-gutters">
              <div class="col-4 mx-auto">
                <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
              </div>
              <div class="col-8">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title d-inline-block col-6">タイトル</h5>
                    <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
                  </div>
                  <div class="row">
                    <p class="card-text place d-inline-block col-6">都道府県</p>
                    <p class="card-text category d-inline-block col-6">カテゴリ</p>
                  </div>
               　  <div class="row">
            　       <p class="card-text summary d-block col-12">概要</p>
               　  </div>
                </div>    　　
              </div>
            </div>
          </a>
        </div>
        <div class="tab-pane fade" id="someday">
          <a class="card mb-3 btn" href="#">
            <div class="row no-gutters">
              <div class="col-4 mx-auto">
                <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
              </div>
              <div class="col-8">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title d-inline-block col-6">タイトル</h5>
                    <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
                  </div>
                  <div class="row">
                    <p class="card-text place d-inline-block col-6">都道府県</p>
                    <p class="card-text category d-inline-block col-6">カテゴリ</p>
                  </div>
               　  <div class="row">
            　       <p class="card-text summary d-block col-12">概要</p>
               　  </div>
                </div>
              </div>
            </div>
          </a>
          <a class="card mb-3 btn" href="#">
            <div class="row no-gutters">
              <div class="col-4 mx-auto">
                <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
              </div>
              <div class="col-8">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title d-inline-block col-6">タイトル</h5>
                    <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
                  </div>
                  <div class="row">
                    <p class="card-text place d-inline-block col-6">都道府県</p>
                    <p class="card-text category d-inline-block col-6">カテゴリ</p>
                  </div>
               　  <div class="row">
          　         <p class="card-text summary d-block col-12">概要</p>
               　  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="tab-pane fade" id="disliked">
          <a class="card mb-3 btn" href="#">
            <div class="row no-gutters">
              <div class="col-4 mx-auto">
                <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
              </div>
              <div class="col-8">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title d-inline-block col-6">タイトル</h5>
                    <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
                  </div>
                  <div class="row">
                    <p class="card-text place d-inline-block col-6">都道府県</p>
                    <p class="card-text category d-inline-block col-6">カテゴリ</p>
                  </div>
            　     <div class="row">
                    <p class="card-text summary d-block col-12">概要</p>
             　    </div>
                </div>
              </div>
            </div>
          </a>
          <a class="card mb-3 btn" href="#">
            <div class="row no-gutters">
              <div class="col-4 mx-auto">
                <img class="card-img" src="https://1.bp.blogspot.com/-mT0SI1MDrK4/XwkxgFf5MHI/AAAAAAABaBY/q6p_E_edBKYDE8NHITw8pZOhGboGpkGOwCNcBGAsYHQ/s1600/food_pork_chup.png"> 
              </div>
              <div class="col-8">
                <div class="card-body">
                  <div class="row line1 h-20">
                    <h5 class="card-title d-inline-block col-6">タイトル</h5>
                    <h5 class="card-subtitle d-inline-block col-6">★★★★★</h5>
                  </div>
                  <div class="row line2 h-15">
                    <p class="card-text city d-inline-block col-6">都道府県</p>
                    <p class="card-text category d-inline-block col-6">カテゴリ</p>
                  </div>
                  <div class="row line3 h-65">
                    <p class="card-text summary d-block col-12">概要</p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('js')
      <script src="{{ secure_asset('js/content.js') }}" defer></script>
@endsection
