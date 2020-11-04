<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth; //認証済みユーザーを取得するファサード
use Illuminate\Support\Facades\Hash; //保存するユーザーパスワードに対しハッシュを提供
//use Illuminate\Validation\Rule;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストの権限を持っているかを判断する
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
            'current-password' => [
                'required',
                //ここに元のパスワードとあってるか確認するバリデーションを置きたい
                function($attribute, $value, $fail){
                    $attribute='現在のパスワード';
                    if(!Hash::check($value, Auth::user()->password)){
                        $fail($attribute.'が違います');
                    }
                }
            ],
            'new-password' => ['required', 'string', 'min:8', 'confirmed','different:current-password']
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
            'current-password' => '現在のパスワード',
            'new-password'=>'新しいパスワード'
        ];
    }
    
}

/**
 * Rule::exits('users')->where(Hash::check($value, Auth::user()->password))
 * function ($attribute,$value, $fail) {
 * if(!(Hash::check($value, Auth::user()->password))) {
 *   return $fail('現在のパスワードを正しく入力してください');
 *  }
 * }
 * /

    
    
    
