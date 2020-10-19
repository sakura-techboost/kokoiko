{{-- 共通ヘッダー読み込み --}}
@extends('layouts.testheader')
{{-- ページタイトル埋め込み --}}
@section('title','新規投稿')

@section('testContent')
　<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card m-5">
          <div class="card-header">
            新規投稿
          </div>
          <div class="card-body">
            <form>
              @csrf
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="name">名称</label>
                <input type="text" class="form-control" id="name" placeholder="名称">
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="url">HP</label>
                <input type="url" class="form-control" id="url" placeholder="ホームページ">
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label sr-only" for="overview">概要</label>
                <textarea class="form-control" id="overview" placeholder="どんなところ？"></textarea>
                <small class="form-text">※タグ付けをすると検索できます</small>
              </div>
              <div class="form-group mb-2">
                <label class="col-form-label" for="placetype_id">登録先</label>
                <select class="form-control" id="placetype_id">
                  <option value="1">お気に入り</option>
                  <option value="2">行ってみたい</option>
                  <option value="3">いまいち</option>
                </select>
              </div>
              {{-- モーダルツールバー --}}
              <div class="btn-social-giza">
                <!--以下住所-->
                <a data-toggle="modal" href="#addAddress" class="btn-social-giza-map" title="住所入力">
                  <span class="fa-stack">
                  <i class="fas fa-certificate fa-stack-2x"></i>
                  <i class="fas fa-map-marker-alt fa-stack-1x"></i>
                  </span>
                </a>
                <div class="modal fade" id="addAddress" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addAddress" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addAddress">住所入力</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group row"> {{-- 住所入力 --}}
                            <label class="col-md-3 col-form-label text-md-right" for="inputAddress01">郵便番号</label>
                            <div class="col-md-7">
                        　　    <input type="text" name="zip1" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" /> - <input type="text" name="zip2" onKeyUp="AjaxZip3.zip2addr('zip1', 'zip2', 'address1', 'address2');" /><br>
                            </div>
                            <label class="col-md-3 col-form-label text-md-right" for="pref_id city_id">住所</label>
                            <div class="col-md-5">
                              <select class="form-control" name="address1" id="pref_id">
                          　　    <option value="">-- 選択してください --</option>
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
                              <input type="text" name="address2" class="form-control" id="city_id" placeholder="市区町村">
                            </div>
                        　</div>
                        　<div class="form-group row">
                        　   <label class="col-md-3 col-form-label text-md-right" for="address">番地等</label>
                            <div class="col-md-5">
                        　　    <input type="text" class="form-control" id="address">
                        　　　</div>
                        　</div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--以下電話番号-->
                <a data-toggle="modal" href="#phone" class="btn-social-giza-phone" title="電話番号入力">
                  <span class="fa-stack">
                  <i class="fas fa-certificate fa-stack-2x"></i>
                  <i class="fas fa-phone fa-stack-1x"></i>
                  </span>
                </a>
                <div class="modal fade" id="phone" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPhoneNunber" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="phone">電話番号登録</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group row">
                        　　<label class="col-md-3 col-form-label text-md-right" for="phone">電話番号</label>
                        　　<div class="col-md-5">
                          　　  <input type="text" class="form-control" id="phone">
                        　　</div>
                        　</div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--以下画像-->
                <a data-toggle="modal" href="#addPictures" class="btn-social-giza-camera" title="画像追加">
                  <span class="fa-stack">
                  <i class="fas fa-certificate fa-stack-2x"></i>
                  <i class="fas fa-camera fa-stack-1x"></i>
                  </span>
                </a>
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
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--以下カテゴリ-->
                <a data-toggle="modal" href="#addCategories" class="btn-social-giza-folder" title="カテゴリー選択">
                  <span class="fa-stack">
                  <i class="fas fa-certificate fa-stack-2x"></i>
                  <i class="far fa-folder fa-stack-1x"></i>
                  </span>
                </a>
                <div class="modal fade" id="addCategories" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addCategories" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addCategories">カテゴリー選択</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group row">
                        　　<label class="col-md-3 col-form-label text-md-right" for="Q_Categories">カテゴリー</label>
                        　　<div class="col-md-5">
                          　　  <select class="form-control" id="Q_Categories">
                            　　<option>グルメ</option>
                            　　<option>ファッション</option>
                          　　　　  <option>雑貨</option>
                            　　　<option>観光スポット</option>
                    　　    　　</select>
                      　　　　</div>
                      　　　</div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--以下関心度-->
                <a data-toggle="modal" href="#attention" class="btn-social-giza-star" title="関心度">
                  <span class="fa-stack">
                  <i class="fas fa-certificate fa-stack-2x"></i>
                  <i class="fas fa-star-half-alt fa-stack-1x"></i>
                  </span>
                </a>
                <div class="modal fade" id="attention" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="attention" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="attention">関心度選択</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="attention_id">関心度</label>
                            <div class="col-md-5">
                              <select class="form-control text-warning" id="attention_id">
                                <option value="1">★★★★★</option>
                                <option value="2">★★★★☆</option>
                                <option value="3">★★★☆☆</option>
                                <option value="4">★★☆☆☆</option>
                                <option value="5">★☆☆☆☆</option>
                              </select>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--以下公開非公開-->
                <a href="#" class="btn-social-giza-open" title="公開設定">
                  <span class="fa-stack">
                  <i class="fas fa-certificate fa-stack-2x"></i>
                  <i class="fas fa-lock-open fa-stack-1x"></i>
                  </span>
                </a>
                <!--以下公開非公開-->
                <a href="#" class="btn-social-giza-lock" title="公開設定">
                  <span class="fa-stack">
                  <i class="fas fa-certificate fa-stack-2x"></i>
                  <i class="fas fa-lock fa-stack-1x"></i>
                  </span>
                </a>
                <button type="button" class="btn btn-primary">登録</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
      <script src="{{ secure_asset('js/testcontent.js') }}" defer></script>
@endsection