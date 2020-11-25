<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * リクエストに適用するバリデーションルールを取得
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->ignore($this->user())],
            'kana' => ['required', 'string', 'max:15'],
            'nickname' => ['required', 'string', 'max:15'],
        ];
    }
    /**
     * バリデーションエラーのカスタム属性の取得
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'kana' => 'ふりがな',
            'nickname' => 'ニックネーム',
        ];
    }
}
