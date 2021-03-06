$(function () {
  //header.blade.php内のエリアから検索部分のポップオーバー
  $('[data-toggle="popover"]').popover();

  //content.blade.php
  //ラジオボタンによる表示切替
  $( 'input[name="switchcontents"]:radio' ).change( function() {
    //選択されているラジオボタンのvalue値を取得(card-1)
    var radioval = $(this).val();
      if(radioval == 'card-1'){
        $('.card-1').removeClass('d-none');
        $('.card-2').addClass('d-none');
        $('.card-3').addClass('d-none');
      }else if(radioval == 'card-2'){
        $('.card-2').removeClass('d-none');
        $('.card-1').addClass('d-none');
        $('.card-3').addClass('d-none');
      }else if(radioval == 'card-3'){
        $('.card-3').removeClass('d-none');
        $('.card-1').addClass('d-none');
        $('.card-2').addClass('d-none');
      }else if(radioval == 'card-all'){
        $('.card-1').removeClass('d-none');
        $('.card-2').removeClass('d-none');
        $('.card-3').removeClass('d-none');
      }
  });
  
  //新規登録フォーム(createContent.blade.php)内のモーダルで入力した値の貼り付け
  //住所登録
  $('#address-form').submit(function(){
    var textCode=$('#form_postalcode').val();
    var textCode2=$('#form_postalcode2').val();
    var selectPref=$('#form_pref option:selected').text();
    var prefValue=$('#form_pref option:selected').val();
    var textAddress=$('#form_address').val();
    //入力された内容をフォームに追加
    //表示テキスト
    $('.address .postalcode').text(textCode + textCode2);
    $('.address .pref').text(selectPref);
    $('.address .address').text(textAddress);
    //データの付与
    $('.address #postalcode').val(textCode + textCode2);
    $('.address option').text(selectPref);
    $('.address option').val(prefValue);
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
    var CategoryValue=$('#form_category_id option:selected').val();
    //入力された内容をフォームに追加
    //表示テキスト
    $('.category span').text(selectCategory);
    //データの付与
    $('.category option').val(CategoryValue);
    $('.category option').text(selectCategory);
    //モーダルを閉じる
    $('#addCategories').modal('hide');
    //画面全体のリロードを止める
    return false;
  });
  //バリデーションエラーの際・編集画面にてロードと同時にカテゴリー入力値の反映をする
  $('.ctgr').each(function () {
    //選択されているvalue値を取得
    var selected = $(this).data('selected');
    //入力値の反映
    if(selected == '1'){
      oldText = 'グルメ';
      $('.category span').text(oldText);
    }else if(selected == '2'){
      oldText = 'ファッション';
      $('.category span').text(oldText);
    }else if(selected == '3'){
      oldText = '雑貨';
      $('.category span').text(oldText);
    }else if(selected == '4'){
      oldText = '観光スポット';
      $('.category span').text(oldText);
    }else{
      oldText = '';
      $('.category span').text(oldText);
    }
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

  //画像のプレビューを表示と非表示
  $("#filesend").change(function(){
    //input type="file"の値が変わったら発火
    var file_count = $("#filesend")[0].files.length;//画像の数を取得
    var file = $("#filesend")[0].files;//すべての画像の情報を取得
    var imageList ="";
    if (file_count > 4 ) {
        alert('登録できる画像は4つまでです');
        return false;
    }
    if(file_count > 0){
      //ファイル数が1つ以上であればプレビューボックスを表示
      $('.preview-box').removeClass('d-none');
      //もしedit.blade.phpにてあらかじめ表示されているプレビューボックスがあったら非表示にする
      if($('.edit-preview-box').length){
        $('.edit-preview-box').remove();
      }
      //$('.reset').removeClass('d-none');
      //ファイルの数だけ処理を行う
      for(var i = 0; i < file_count; i++){
        var filereader = new FileReader();
        //ファイルにインデックス番号を付ける
        var file_info = file[i];
        //ファイルがロードされたら発火
        filereader.onload = function(event){
          //画像を表示するHTMLを作成
          imageList = `${imageList}<div class="preview col-3"><img class="card-img img-thumbnail rounded d-block" id="preview" src="${event.target.result}"></div>`;
          $(".preview-box").html(imageList);
        }
        //filereaderを先に読み込む
        filereader.readAsDataURL(file_info);//readAsDateURLメソッドでファイルを読み込む、他にあるので好きなのでいい
      }
    }else{
        $(".preview-box").html("");
        $('.preview-box').addClass('d-none');
    }
  });

  //記事詳細画面(show.blade.php)

  //カルーセル内のアイコンの色を変える
  $(function () {
    const iconColor = "#000";
    $('.carousel-control-prev-icon').css("background-image", `url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='${encodeURIComponent(iconColor)}' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")`);
    $(".carousel-control-next-icon").css("background-image", `url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='${encodeURIComponent(iconColor)}' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")`); 
  });

  //近くのエリアのカードをホバーすると、そのカードの住所がiframeに渡される
  $('.map-card').hover(function () {
    var address = $(this).attr('value');
    var setAddress = 'https://maps.google.co.jp/maps?output=embed&q=' + address;
    $('.other').attr('src',setAddress);
  })


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

  //画像編集画面にて送信ボタンが押された時のアラート
  // 送信ボタンクリックが送信タイミングとは限らない（Enterかもしれないし）ので、フォームのsubmitイベントを拾うようにする
  $('#file-edit-form').on('submit', function(e, context) {
    // 実行指示のパラメータがあれば何もしない
    if (context === 'execute') {
        return;
    }

    // 確認表示の為に送信を抑止する
    e.preventDefault();

    if (confirm('画像データが上書きされます。よろしいですか？(画像が選択されていなければ登録されていた画像は削除されます)')) {
        // はいが選択されたらフォームを送信する
        $(this).trigger('submit', ['execute']);
    }

  });
});