<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ContentsController@top');

Auth::routes();


//ログイン時のみアクセス可能
Route::group(['middleware' => 'auth'], function () {
    //ユーザー情報を取得・表示するルーティング
    Route::get('profile/mypage', 'Admin\UserController@index');
    //ユーザー情報を編集・表示するルーティング
    Route::get('profile/mypage', 'Admin\UserController@edit');
    //変更内容を更新し、プロフィール画面へリダイレクトするルーティング
    Route::post('profile/mypage', 'Admin\UserController@update');
    //createCntent.blade.php(記事投稿画面)を表示するルーティング
    Route::get('contents/createContent', 'CreateContentController@showCreateForm')->name('createContent.showCreateForm');
    //記事を投稿するルーティング
    Route::post('contents/createContent', 'CreateContentController@createContent')->name('createContent.createContent');

    //content.blade.php(記事一覧画面)を表示するルーティング
    Route::get('contents/content', 'ContentsController@content')->name('contents.content');
    //記事の検索をするルーティング
    Route::get('contents/search/content', 'SearchContentsController@index')->name('contents.index');
    //地図で見る検索のルーティング
    Route::get('contents/search/map', 'SearchContentsController@mapindex')->name('contents.mapindex');
    //show.blade.php(記事詳細画面)を表示するルーティング
    Route::get('contents/show/{id}', 'CreateContentController@show')->name('contents.show');
    //edit.blade.php(記事編集画面)を表示するルーティング
    Route::get('contents/edit/{id}', 'ContentsController@edit')->name('contents.edit');
    //fileEdit.blade.php(画像変更画面)を表示するルーティング
    Route::get('contents/fileEdit/{id}', 'FileEditController@fileEdit')->name('contents.fileEdit');
    //画像の変更内容を反映させるルーティング
    Route::post('contents/fileEdit/{id}', 'FileEditController@update')->name('contents.fileupdate');
    //記事の編集内容を反映させるルーティング
    Route::post('contents/edit/{id}', 'ContentsController@update')->name('contents.update');
    //記事の内容を削除するルーティング
    Route::get('contents/delete/{id}', 'ContentsController@delete')->name('contents.delete');
});

//ログインしているユーザーがパスワードを変更する(web引数はbackメソッドを有効にするため)
Route::group(['middleware' => ['auth', 'web']], function () {
    //パスワード編集画面の表示
    Route::get('/profile/resetpass', 'Admin\UserController@editPassword')->name('profile.resetpass');
    //編集内容を更新し、編集画面へリダイレクトする
    Route::post('/profile/resetpass', 'Admin\UserController@updatePassword')->name('profile.resetpass');
});

//top.blade.php(トップページ)を表示するルーティング
Route::get('contents/top', 'ContentsController@top')->name('contents.top');


