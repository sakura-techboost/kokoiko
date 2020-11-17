<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;//Placeモデルを使う
use Illuminate\Support\Facades\Auth; //認証済みユーザーを取得するファサード
use App\Http\Requests\CreateContentRequest;
use Log;

class CreateContentController extends Controller
{
    //新規投稿画面を表示する
    public function showCreateForm(){
        return view('contents.createContent');
    }
    //記事を作成する
    public function createContent(CreateContentRequest $request){
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
        $place->pref=$request->pref;//都道府県
        $place->address=$request->address;//市区町村以下
        $place->phone=$request->phone;//電話番号
        $place->category_id=$request->category_id;//カテゴリー
        $place->url=$request->url;//URL
        $place->status=$request->status;//公開非公開
        //画像ファイル
        $file = $request->file('datafile', null);
        if (isset($file)) {
            $mime = $file->getClientMimeType();
            $fileMimes = explode('/', $mime);
            $fileExt = $fileMimes[1];
            Log::debug($fileExt);
            $file_name = 'image_01.' . $fileExt;
            $place_id = time();
            $place->datafile = $file->storeAS("public/images/{$place->user_id}/{$place_id}", $file_name);
            Log::debug('OK');
            Log::debug($place->datafile);
        }
        else {
            Log::debug('null');
            $place->datafile = null;
        }

        // DB保存

        $place->save();
        return redirect('contents/createContent');
        //dd('stop');

    /*
        $files = $request->file('datafile');
        if (isset($files[0])) {
            $files = $request->file('datafile.0');
            foreach($files as $file){
                //$file_name = $file->getClientOriginalName();
                $file_name = '1.png';
                $file->storeAS('public/post_images',$file_name);
                //$place->datafile = $request->datafile->storeAs('public/post_images', $time.'_'.Auth::user()->id . '.jpg');

            }
            $path = $request->file('image')->store('public/image');
            $place->datafile = basename($path);
          } else {
            $place->datafile = null;
          }
*/        

    }
}
