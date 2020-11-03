<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //認証済みユーザーを取得するファサード

class UserController extends Controller
{
    //userデータの取得
    public function index() {
        return view('profile.mypage', ['user' => Auth::user() ]);
    }
    //userデータの編集
    public function edit() {
        return view('profile.mypage', ['user' => Auth::user() ]);
    }
    //userデータの保存
    public function update(Request $request) {
  
        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('profile/mypage');
    }
}
