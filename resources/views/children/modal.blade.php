
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
                <select class="form-control" name="address1" id="form_pref">
                  <option value="">-- 都道府県 --</option>
                  <option value="北海道">北海道</option>
                  <option value="青森県">青森県</option>
                  <option value="岩手県">岩手県</option>
                  <option value="宮城県">宮城県</option>
                  <option value="秋田県">秋田県</option>
                  <option value="山形県">山形県</option>
                  <option value="福島県">福島県</option>
                  <option value="茨城県">茨城県</option>
                  <option value="栃木県">栃木県</option>
                  <option value="群馬県">群馬県</option>
                  <option value="埼玉県">埼玉県</option>
                  <option value="千葉県">千葉県</option>
                  <option value="東京都">東京都</option>
                  <option value="神奈川県">神奈川県</option>
                  <option value="新潟県">新潟県</option>
                  <option value="富山県">富山県</option>
                  <option value="石川県">石川県</option>
                  <option value="福井県">福井県</option>
                  <option value="山梨県">山梨県</option>
                  <option value="長野県">長野県</option>
                  <option value="岐阜県">岐阜県</option>
                  <option value="静岡県">静岡県</option>
                  <option value="愛知県">愛知県</option>
                  <option value="三重県">三重県</option>
                  <option value="滋賀県">滋賀県</option>
                  <option value="京都府">京都府</option>
                  <option value="大阪府">大阪府</option>
                  <option value="兵庫県">兵庫県</option>
                  <option value="奈良県">奈良県</option>
                  <option value="和歌山県">和歌山県</option>
                  <option value="鳥取県">鳥取県</option>
                  <option value="島根県">島根県</option>
                  <option value="岡山県">岡山県</option>
                  <option value="広島県">広島県</option>
                  <option value="山口県">山口県</option>
                  <option value="徳島県">徳島県</option>
                  <option value="香川県">香川県</option>
                  <option value="愛媛県">愛媛県</option>
                  <option value="高知県">高知県</option>
                  <option value="福岡県">福岡県</option>
                  <option value="佐賀県">佐賀県</option>
                  <option value="長崎県">長崎県</option>
                  <option value="熊本県">熊本県</option>
                  <option value="大分県">大分県</option>
                  <option value="宮崎県">宮崎県</option>
                  <option value="鹿児島県">鹿児島県</option>
                  <option value="沖縄県">沖縄県</option>  
                </select>
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
                <select class="form-control" id="form_category_id">
                  <option value="01">グルメ</option>
                  <option value="02">ファッション</option>
                  <option value="03">雑貨</option>
                  <option value="04">観光スポット</option>
                </select>
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
          <form action="{{ action('ContentsController@index') }}" method="get">
            @csrf
            <div class="form-group mb-4">
              <label class="sr-only" for="kw">検索キーワード</label>
              <input type="text" class="form-control" placeholder="キーワード" id="kw" name="search_name" value={{ $search_name }}>
            </div>
            <div class="form-group mb-4 city">
              <label for="receipt">都道府県</label>
              <select class="form-control" id="city">
                <option>未選択</option>
                <option>北海道</option>
                <option>青森</option>
                <option>東京</option>
              </select>
            </div>
            <div class="form-group mb-4">
              <label for="receipt">カテゴリ</label>
              <select class="form-control" id="category">
                <option>未選択</option>
                <option>グルメ</option>
                <option>ファッション</option>
                <option>雑貨</option>
              </select>
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
<!-- ふりがな -->
<div class="modal fade" id="edit-kana" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit-kana" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-kana">ふりがな変更</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="kana-form">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right" for="form_kana">ふりがな</label>
            <div class="col-md-5">
              <input type="text" class="form-control" id="form_kana">
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
