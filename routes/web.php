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
//content.blade.phpを表示するルーティング
Route::get('contents/content', 'ContentsController@content')->name("contents.content");
//create.blade.php(アカウント登録画面）を表示するルーティング
Route::get('profile/create', 'ProfileController@create')->name("profile.create");
//login.blade.php(ログイン画面）を表示するルーティング
Route::get('profile/login', 'ProfileController@login')->name("profile.login");
Route::get('contents/show', 'ContentsController@show');

//testCntent.blade.phpを表示するルーティング
Route::get('contents/testContent', 'ContentsController@testContent')->name("contents.testContent");
//createCntent.blade.phpを表示するルーティング
Route::get('contents/createContent', 'ContentsController@createContent')->name("contents.createContent");


//Route::get('csv-test', 'CsvController@test')->name("csv.test");
