
{{-- createContent.blade.php(新規投稿フォーム(#new))のモーダル --}}
 <!-- 住所入力フォーム　-->
  <div class="modal fade" id="addAddress" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addAddress" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAddress">住所入力</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="address-form">
          <div class="modal-body">
            <div class="form-group row"> 
              {{-- 住所入力 --}}
              <label class="col-md-12 col-form-label" for="form_postalcode">郵便番号</label>
              <div class="col-md-12">
                <input type="text" id="form_postalcode" name="zip1" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');"> - 
                <input type="text" id="form_postalcode2" name="zip2" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');"><br>
              </div>
              <label class="col-md-12 col-form-label" for="form_pref form_address">住所</label>
              <div class="col-md-9">
                {!! Form::select('address1',Config::get('place.prefs') ,'',['class' => 'form-control','id' => 'form_pref']) !!}
                <input type="text" name="address2" class="form-control" id="form_address" placeholder="住所">
              </div>
            </div>           
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">登録</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- 電話番号登録フォーム -->
  <div class="modal fade" id="addPhone" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPhone" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPhone">電話番号登録</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="phone-form">
          <div class="modal-body">
            <div class="form-group row">
          　　<label class="col-md-3 col-form-label text-md-right" for="form_phone">電話番号</label>
          　　<div class="col-md-5">
            　　  <input type="text" class="form-control" id="form_phone">
          　　</div>
          　</div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">登録</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- カテゴリー選択フォーム -->
  <div class="modal fade" id="addCategories" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addCategories" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCategories">カテゴリー選択</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="category-form">
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right" for="form_category_id">カテゴリー</label>
              <div class="col-md-5">
                {!! Form::select('category', Config::get('place.category') ,'',['class' => 'form-control','id' => 'form_category_id']) !!}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">登録</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- URL登録フォーム -->
  <div class="modal fade" id="addUrl" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addUrl" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUrl">リンク登録</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="url-form">
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right" for="form_url">HPアドレス</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="form_url">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">登録</button>
          </div>
        </form>
      </div>
    </div>
  </div>

{{-- header.blade.php(レイアウトブレード) --}}
<!-- モーダルダイアログに検索メニュー(#search-menu)を載せる -->
　<div class="modal fade" id="search-menu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="card-title">検索</h6>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('contents.index') }}" method="get">
            <div class="form-group mb-4">
              {!! Form::label('kw', '検索キーワード:') !!}
              {!! Form::text('kw' , old('kw'), ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
            </div>
            <div class="form-group mb-4 city">
              {!! Form::label('pref', '都道府県:') !!}
              {!! Form::select('pref', ['指定なし' => '指定なし'] + Config::get('place.prefs') ,old('pref'),['class' => 'form-control']) !!}
            </div>
            <div class="form-group mb-4">
              {!! Form::label('category', 'カテゴリー:') !!}
              {!! Form::select('category', ['指定なし' => '指定なし'] + Config::get('place.category') ,old('category'),['class' => 'form-control']) !!}
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">検索</button>
            </div>
          </form>
      　</div>
    　</div>
  　</div>
  </div>

{{-- mypage.blade.php(プロフィール編集画面) --}}
<!-- モーダルダイアログでプロフィールを編集する -->
<!-- 名前 -->
<div class="modal fade" id="edit-name" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit-name" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-name">名前変更</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="name-form">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right" for="form_name">名前</label>
            <div class="col-md-5">
              <input type="text" class="form-control" id="form_name">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">変更</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ニックネーム -->
<div class="modal fade" id="edit-nickname" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit-nickname" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-nickname">ニックネーム変更</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="nickname-form">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right" for="form_nickname">ニックネーム</label>
            <div class="col-md-5">
              <input type="text" class="form-control" id="form_nickname">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">変更</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- メールアドレス変更 -->
<div class="modal fade" id="edit-email" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit-email" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-email">メールアドレス変更</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="email-form">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right" for="form_email">メールアドレス</label>
            <div class="col-md-5">
              <input type="text" class="form-control" id="form_email">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">変更</button>
        </div>
      </form>
    </div>
  </div>
</div>
