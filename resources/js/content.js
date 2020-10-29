$(function () {
  //header.blade.php内のエリアから検索部分のポップオーバー
  $('[data-toggle="popover"]').popover()
  
  //新規登録フォーム(createContent.blade.php)内のモーダルで入力した値の貼り付け
  //住所登録
  $('#address-form').submit(function(){
    var selectPref=$('#form_pref_id option:selected').text();
    var prefId=$('#form_pref_id option:selected').val();
    var textCity=$('#form_city_id').val();
    var textAddress=$('#form_address').val();
    //入力された内容をフォームに追加
    //表示テキスト
    $('.address .pref_id').text(selectPref);
    $('.address .city_id').text(textCity);
    $('.address .address').text(textAddress);
    //データの付与
    $('.address option').text(selectPref);
    $('.address option').val(prefId);
    $('.address #city_id').val(textCity);
    $('.address #address').val(textAddress);
    //モーダルを閉じる
    $('#addAddress').modal('hide');
    //画面全体のリロードを止める
    return false;
  });
  
  //電話番号登録
  $('#phone-form').submit(function(){
    var textPhone=$('#form_phone').val();
    //入力された内容をフォームに追加
    //表示テキスト
    $('.phone span').text(textPhone);
    //データの付与
    $('.phone input').attr('value',textPhone);
    //モーダルを閉じる
    $('#addPhone').modal('hide');
    return false;
  });
  
  //カテゴリー登録
  $('#category-form').submit(function(){
    var selectCategory=$('#form_category_id option:selected').text();
    var CategoryId=$('#form_category_id option:selected').val();
    //入力された内容をフォームに追加
    //表示テキスト
    $('.category span').text(selectCategory);
    //データの付与
    $('.category option').val(CategoryId);
    $('.category option').text(selectCategory);
    //モーダルを閉じる
    $('#addCategories').modal('hide');
  });
  
    //関心度登録
  $('#attention-form').submit(function(){
    var selectAttention=$('#form_attention_id option:selected').text();
    var attentionId=$('#form_attention_id option:selected').val();
    //入力された内容をフォームに追加
    //表示テキスト
    $('.attention span').text(selectAttention);
    //データの付与
    $('.attention option').val(attentionId);
    $('.attention option').text(selectAttention);
    //モーダルを閉じる
    $('#addAttention').modal('hide');
  });
  
})