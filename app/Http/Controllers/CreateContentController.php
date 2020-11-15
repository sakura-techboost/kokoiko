<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;//Placeモデルを使う
use Illuminate\Support\Facades\Auth; //認証済みユーザーを取得するファサード

class CreateContentController extends Controller
{
    //新規投稿画面を表示する
    public function showCreateForm(){
        return view('contents.createContent');
    }
    //記事を作成する
    public function createContent(Request $request){
        //Placeモデルのインスタンスを作成
        $place=new Place();

        //インスタンスにフォーム内のデータを入れる
        //$place = $request->all();
        $place->user_id = Auth::user()->id;//登録ユーザーからidを取得
        $place->name=$request->name;//場所の名前
        $place->overview=$request->overview;//概要
        $place->placetype_id=$request->placetype_id;//登録先
        $place->attention_id=$request->attention_id;//関心度
        $place->postalcode=$request->postalcode;//郵便番号
        $place->pref_id=$request->pref_id;//都道府県
        $place->city_id=$request->city_id;//市区町村
        $place->address=$request->address;//番地以下
        $place->phone=$request->phone;//電話番号
        $place->category_id=$request->category_id;//カテゴリー
        $place->url=$request->url;//URL
        $place->public_id=$request->public_id;//公開非公開
        if (isset($place['image'])) {
            $files = $request->file('file');
            foreach($files as $file){
                $file_name = $file->getClientOriginalName();
                $file->storeAS('',$file_name);
            }
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
          } else {
              $news->image_path = null;
          }
        
        $place->image_url=$request->image_url->storeAs('public/post_images', $time.'_'.Auth::user()->id . '.jpg');

    }
}
