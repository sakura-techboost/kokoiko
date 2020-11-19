<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'pref' => ['nullable','string'],//都道府県：任意入力・文字列であること
            'address' => ['nullable','max:100'],//市区町村以下：任意入力・全角100文字まで
            'phone' => ['nullable','numeric','digits_between:9,12'],//電話番号：任意入力・数字・3~12桁であること
            'category_id' => ['nullable'],
            'url' => ['nullable','url'],//HP：任意入力・URLの形式であること
            'datafile.*' => ['nullable', 'file', 'mimes:jpeg,png', 'max:10240'],//画像：任意入力・ファイルであること・拡張子はjpegかpngであること・ファイルサイズは1MG以下であること
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
            'name'  => '名称',
            'overview'   => '概要',
            'placetype_id'  => '登録先',
            'attention_id'  => '関心度',
            'postalcode' => '郵便番号',
            'pref' => '都道府県',
            'address' => '住所',
            'phone' => '電話番号',
            'category_id' => 'カテゴリー',
            'url' => 'URL',
            'datafile' => '画像',
        ];
    }
}
