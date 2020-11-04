<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //認証済みユーザーを取得するファサード
use App\Http\Requests\UpdatePasswordRequest;


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
    

    //パスワード編集画面を表示
    public function editPassword()
    {
        return view('profile.resetpass',['user' => Auth::user() ]);
    }
   
    //パスワードの保存
    public function updatePassword(UpdatePasswordRequest $request){
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('update_password_success', 'パスワードを変更しました。');
    }
   

}