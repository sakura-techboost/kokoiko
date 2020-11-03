
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
              <label class="col-md-3 col-form-label text-md-right" for="inputAddress01">郵便番号</label>
              <div class="col-md-7">
                <input type="text" name="zip1" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" /> - <input type="text" name="zip2" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" /><br>
              </div>
              <label class="col-md-3 col-form-label text-md-right" for="form_pref_id form_city_id">住所</label>
              <div class="col-md-5">
                <select class="form-control" name="address1" id="form_pref_id">
                  <option value="01">北海道</option>
                  <option value="02">青森県</option>
                  <option value="03">岩手県</option>
                  <option value="04">宮城県</option>
                  <option value="05">秋田県</option>
                  <option value="06">山形県</option>
                  <option value="07">福島県</option>
                  <option value="08">茨城県</option>
                  <option value="09">栃木県</option>
                  <option value="10">群馬県</option>
                  <option value="11">埼玉県</option>
                  <option value="12">千葉県</option>
                  <option value="13">東京都</option>
                  <option value="14">神奈川県</option>
                  <option value="15">新潟県</option>
                  <option value="16">富山県</option>
                  <option value="17">石川県</option>
                  <option value="18">福井県</option>
                  <option value="19">山梨県</option>
                  <option value="20">長野県</option>
                  <option value="21">岐阜県</option>
                  <option value="22">静岡県</option>
                  <option value="23">愛知県</option>
                  <option value="24">三重県</option>
                  <option value="25">滋賀県</option>
                  <option value="26">京都府</option>
                  <option value="27">大阪府</option>
                  <option value="28">兵庫県</option>
                  <option value="29">奈良県</option>
                  <option value="30">和歌山県</option>
                  <option value="31">鳥取県</option>
                  <option value="32">島根県</option>
                  <option value="33">岡山県</option>
                  <option value="34">広島県</option>
                  <option value="35">山口県</option>
                  <option value="36">徳島県</option>
                  <option value="37">香川県</option>
                  <option value="38">愛媛県</option>
                  <option value="39">高知県</option>
                  <option value="40">福岡県</option>
                  <option value="41">佐賀県</option>
                  <option value="42">長崎県</option>
                  <option value="43">熊本県</option>
                  <option value="44">大分県</option>
                  <option value="45">宮崎県</option>
                  <option value="46">鹿児島県</option>
                  <option value="47">沖縄県</option>
            　　　</select>
                <input type="text" name="address2" class="form-control" id="form_city_id" placeholder="市区町村">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right" for="form_address">番地等</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="form_address">
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
  <!-- 画像登録フォーム -->
  <div class="modal fade" id="addPictures" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPictures" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPictures">画像追加</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row cameraicon">
              <label for="filesend" class="col-md-3 col-form-label text-md-righit">
                {{-- 画像アップロード(アイコン部分） --}}
      　　    　   <div class="filelabel" title="ファイル選択">
          　　      <i class="fas fa-camera"></i>
              　</div>
                {{-- 画像アップロード(フォーム部分)※非表示 --}}
              　<input type="file" name="datafile" id="filesend" multiple accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
              </label>
              {{-- プレビューを表示する場所 --}}
              <div class="col-md-9">
                <div class="preview">
                  <span class="d-inline-block" id="previewbox"></span>
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
  <!-- 関心度選択フォーム -->
  <div class="modal fade" id="addAttention" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="attention" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAttention">関心度選択</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="attention_form">
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right" for="form_attention_id">関心度</label>
              <div class="col-md-5">
                <select class="form-control text-warning" id="form_attention_id">
                  <option value="1">★★★★★</option>
                  <option value="2">★★★★☆</option>
                  <option value="3">★★★☆☆</option>
                  <option value="4">★★☆☆☆</option>
                  <option value="5">★☆☆☆☆</option>
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
          <form>
            <div class="form-group mb-4">
              <label class="sr-only" for="kw">検索キーワード</label>
              <input type="search" class="form-control" placeholder="キーワード" id="kw">
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
<!-- パスワード変更 -->
<div class="modal fade" id="edit-pass" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit-pass" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-pass">パスワード変更</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="pass-form">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right" for="form_pass">パスワード</label>
            <div class="col-md-5">
              <input type="text" class="form-control" id="form_pass">
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