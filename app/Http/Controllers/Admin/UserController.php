<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;//認証済みユーザーを取得するファサード
use App\Http\Requests\UserRequest;
use Illuminate\View\View;

//プロフィールアップデート時のバリデーション

/**
 * ユーザー情報を編集する
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{

    /**
     * userデータの取得
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('profile.mypage', ['user' => Auth::user()]);
    }

    /**
     * userデータの編集ページを表示
     * @return Application|Factory|View
     */
    public function edit()
    {
        return view('profile.mypage', ['user' => Auth::user()]);
    }

    /**
     * userデータのアップデート
     * @param UserRequest $request
     * @return Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserRequest $request)
    {
        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);

        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('profile/mypage')->with('update_profile_success', 'プロフィールを変更しました。');
    }

    /**
     * パスワード編集画面を表示
     * @return Application|Factory|View
     */
    public function editPassword()
    {
        return view('profile.resetpass', ['user' => Auth::user()]);
    }

    /**
     * パスワードのアップデート
     * @param UpdatePasswordRequest $request
     * @return RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('update_password_success', 'パスワードを変更しました。');
    }
}
