<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  //アカウント登録画面(create.blade.php)を表示する
  public function create() {
  return view('profile.create');
  }
  
  //ログイン画面(login.blade.php)を表示する
  public function login() {
  return view('profile.login');
  }
}
