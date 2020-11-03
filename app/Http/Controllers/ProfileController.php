<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  //プロフィール編集画面を表示する
  public function edit(){
    return view('profile.mypage');
  }

  
  //以下開発段階で使用
  //アカウント登録画面(create.blade.php)を表示する
  /**public function create() {
   *return view('profile.create');
   *}
   */
  //ログイン画面(login.blade.php)を表示する
  /**public function login() {
   *return view('profile.login');
   *}
   */
  

}
