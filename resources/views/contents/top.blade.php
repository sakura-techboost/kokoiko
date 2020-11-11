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
</div>
@endsection
@section('js')
  <script src="{{ secure_asset('js/content.js') }}" defer></script>
@endsection

@guest

@endguest
