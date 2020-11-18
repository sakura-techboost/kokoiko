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

        //画像ファイルについて
        //アップロードしたファイルをファイルメソッドで取得。nullableにしたいため、第2引数にnull
        $file = $request->file('datafile', null);
        //もし$fileにフォームからのデータが入っていたら
        if (isset($file)) {
            //ファイルのマイムタイプを取得
            $mime = $file->getClientMimeType();
            //マイムタイプを/の前後で分割し、fileMimes配列に入れる
            $fileMimes = explode('/', $mime);
            //配列の二つ目(image/jpegならjpegの部分)をファイルの拡張子としてfileExtに入れる
            $fileExt = $fileMimes[1];
            //ここまでの処理が無事完了したらログにメッセージを残す
            Log::debug($fileExt);
            //ファイル名の後ろに拡張子を付ける
            $file_name = 'image_01.' . $fileExt;
            //idに投稿時間を入れる
            $place_id = time();
            //public/images配下に投稿したユーザーのフォルダ、記事の投稿時間フォルダを作成し中に画像名を指定して保存
            //$place->datafile = $file->storeAS("public/images/{$place->user_id}/{$place_id}", $file_name);
            $place->datafile = $file->storeAs("public/images/{$place->user_id}", $file_name);
            Log::debug('OK');
        }
        else {
            //データがなければnull
            Log::debug('null');
            $place->datafile = null;
        }

        // 投稿内容をDBに保存
        $place->save();

        //処理が終わったら記事一覧画面へリダイレクト
        return redirect('contents/content')->with('create_content_success', '投稿しました');
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
