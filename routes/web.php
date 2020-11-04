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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ログイン時のみアクセス可能
Route::group(['middleware' => 'auth'], function() {
  //ユーザー情報を取得・表示するルーティング
  Route::get('profile/mypage', 'Admin\UserController@index');
  //ユーザー情報を編集・表示するルーティング
  Route::get('profile/mypage', 'Admin\UserController@edit');
  //変更内容を更新し、プロフィール画面へリダイレクトするルーティング
  Route::post('profile/mypage', 'Admin\UserController@update');
});

//ログインしているユーザーがパスワードを変更する
Route::group(['middleware' => ['auth', 'web']], function () {
  //パスワード編集画面の表示
  Route::get('/profile/resetpass', 'Admin\UserController@editPassword')->name('profile.resetpass');
  //編集内容を更新し、編集画面へリダイレクトする
  Route::post('/profile/resetpass', 'Admin\UserController@updatePassword')->name('profile.resetpass');
});

//content.blade.php(記事一覧画面)を表示するルーティング
Route::get('contents/content', 'ContentsController@content')->name("contents.content");
//show.blade.php(記事詳細画面)を表示するルーティング
Route::get('contents/show', 'ContentsController@show');
//createCntent.blade.php(記事投稿画面)を表示するルーティング
Route::get('contents/createContent', 'ContentsController@createContent')->name("contents.createContent");

//以下開発段階で使用

  //Route::get('csv-test', 'CsvController@test')->name("csv.test");
//create.blade.php(アカウント登録画面）を表示するルーティング
  //Route::get('profile/create', 'ProfileController@create')->name("profile.create");
//login.blade.php(ログイン画面）を表示するルーティング
  //Route::get('profile/login', 'ProfileController@login')->name("profile.login");
//testCntent.blade.phpを表示するルーティング
  //Route::get('contents/testContent', 'ContentsController@testContent')->name("contents.testContent");
