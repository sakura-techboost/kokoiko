<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth; //認証済みユーザーを取得するファサード

class CreateContentRequest extends FormRequest
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
            'name'  => ['required', 'max:50'],  //名称：入力必須・全角50文字まで
            'overview'   => ['required', 'max:1000'],  // 概要：入力必須・全角1000文字まで
            'placetype_id'  => ['required'],  //登録先：入力必須
            'attention_id'  => ['required'], //関心度：入力必須
            'postalcode' => ['nullable','string','size:7'],//郵便番号：任意入力・文字列・7桁であること
            'pref' => ['nullable','string'],
            'address' => ['nullable','max:100'],//市区町村以下：任意入力・全角100文字まで
            'phone' => ['nullable','numeric','digits_between:9,12'],//電話番号：任意入力・数字・3~12桁であること
            'category_id' => ['nullable','integer'],
            'url' => ['nullable','url'],//HP：任意入力・URLの形式であること
            'datafile' => ['nullable', 'file', 'image', 'mimes:jpeg,png', 'max:10240'],
        ];
    }
}
