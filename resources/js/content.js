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
    //画面全体のリロードを止める
    return false;
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
    //画面全体のリロードを止める
    return false;
  });
  

  //記事詳細画面(show.blade.php)

  //カルーセル内のアイコンの色を変える
  $(function () {
    const iconColor = "#000";
  
    $('.carousel-control-prev-icon').css("background-image", `url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='${encodeURIComponent(iconColor)}' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")`);
    $(".carousel-control-next-icon").css("background-image", `url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='${encodeURIComponent(iconColor)}' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")`);
    

  });

})