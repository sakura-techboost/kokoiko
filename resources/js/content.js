$(function () {
  //header.blade.php内のエリアから検索部分のポップオーバー
  $('[data-toggle="popover"]').popover()
  
  //新規登録フォーム(createContent.blade.php)内のモーダルで入力した値の貼り付け
  //住所登録
  $('#address-form').submit(function(){
    var selectPref=$('#pref_id option:selected').text();
    var textCity=$('#city_id').val();
    var textAddress=$('#address').val();
    //入力された内容をフォームに追加
    $('.address .pref_id').text(selectPref);
    $('.address .city_id').text(textCity);
    $('.address .address').text(textAddress);
    //モーダルを閉じる
    $('#addAddress').modal('hide');
  });
  
  //電話番号登録
  $('#phone-form').submit(function(){
    var textPhone=$('#phone').text();
    //入力された内容をフォームに追加
    $('.phone span').text(textPhone);
    $('.phone input').attr('value',textPhone);
    //モーダルを閉じる
    $('#addPhoneNunber').modal('hide');
  });
  
  //カテゴリー登録
  $('#category-form').submit(function(){
    var selectCategory=$('#category_id option:selected').text();
    //入力された内容をフォームに追加
    $('.category span').text(selectCategory);
    //モーダルを閉じる
    $('#addCategories').modal('hide');
  });
  
    //関心度登録
  $('#attention-form').submit(function(){
    var selectAttention=$('#attention_id option:selected').text();
    //入力された内容をフォームに追加
    $('.attention span').text(selectAttention);
    //モーダルを閉じる
    $('#addAttention').modal('hide');
  });
  
})