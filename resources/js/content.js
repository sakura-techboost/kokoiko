$(function () {
  //header.blade.php内のエリアから検索部分のポップオーバー
  $('[data-toggle="popover"]').popover()
  
  //新規登録フォーム(createContent.blade.php)内のモーダルで入力した値の貼り付け
  //住所登録
  $('#address-form').submit(function(){
    var textCode=$('#form_postalcode').val();
    var selectPref=$('#form_pref_id option:selected').text();
    var prefId=$('#form_pref_id option:selected').val();
    var textCity=$('#form_city_id').val();
    var textAddress=$('#form_address').val();
    //入力された内容をフォームに追加
    //表示テキスト
    $('.address .postalcode').text(textCode);
    $('.address .pref_id').text(selectPref);
    $('.address .city_id').text(textCity);
    $('.address .address').text(textAddress);
    //データの付与
    $('.address #postalcode').val(textCode);
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
  
  //電話番号登録
  $('#url-form').submit(function(){
    var textUrl=$('#form_url').val();
    //入力された内容をフォームに追加
    //表示テキスト
    $('.url span').text(textUrl);
    //データの付与
    $('.url input').attr('value',textUrl);
    //モーダルを閉じる
    $('#addUrl').modal('hide');
    return false;
  });
  

  //記事詳細画面(show.blade.php)

  //カルーセル内のアイコンの色を変える
  $(function () {
    const iconColor = "#000";
  
    $('.carousel-control-prev-icon').css("background-image", `url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='${encodeURIComponent(iconColor)}' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")`);
    $(".carousel-control-next-icon").css("background-image", `url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='${encodeURIComponent(iconColor)}' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")`);
    
  });

  //プロフィール編集画面(mypage.blade.php)
  //名前変更
  $('#name-form').submit(function(){
    var editedName=$('#form_name').val();
    //入力された内容をフォームに追加
    //データの送信
    if(editedName!=''){
      //フォーム内が空でなければデータを上書き
      $('#name').attr('value',editedName);
      //モーダルを閉じる
      $('#edit-name').modal('hide');
      return false;
    }else{
      //モーダルを閉じる
      $('#edit-name').modal('hide');
      return false;
    }
  });
  //カナ変更
  $('#kana-form').submit(function(){
    var editedKana=$('#form_kana').val();
    //入力された内容をフォームに追加
    //データの送信
    if(editedKana!=''){
      //フォーム内が空でなければデータを上書き
      $('#kana').attr('value',editedKana);
      //モーダルを閉じる
      $('#edit-kana').modal('hide');
      return false;
    }else{
      //モーダルを閉じる
      $('#edit-kana').modal('hide');
      return false;
    }
  });
  //ニックネーム変更
  $('#nickname-form').submit(function(){
    var editedNickname=$('#form_nickname').val();
    //入力された内容をフォームに追加
    //データの送信
    if(editedNickname!=''){
      //フォーム内が空でなければデータを上書き
      $('#nickname').attr('value',editedNickname);
      //モーダルを閉じる
      $('#edit-nickname').modal('hide');
      return false;
    }else{
      //モーダルを閉じる
      $('#edit-nickname').modal('hide');
      return false;
    }
  });
  //メールアドレス変更
  $('#email-form').submit(function(){
    var editedEmail=$('#form_email').val();
    //入力された内容をフォームに追加
    //データの送信
    if(editedEmail!=''){
      //フォーム内が空でなければデータを上書き
      $('#email').attr('value',editedEmail);
      //モーダルを閉じる
      $('#edit-email').modal('hide');
      return false;
    }else{
      //モーダルを閉じる
      $('#edit-email').modal('hide');
      return false;
    }
  });
})