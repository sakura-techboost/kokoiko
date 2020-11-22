<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContentRequest;
use App\Place; //Placeモデルを使う
use Illuminate\Http\Request; //認証済みユーザーを取得するファサード
use Illuminate\Support\Facades\Auth;
use Imagick;
use Log;

class CreateContentController extends Controller
{
    //新規投稿画面を表示する
    public function showCreateForm()
    {
        return view('contents.createContent');
        dd("show");
    }
    //記事を作成する
    public function createContent(CreateContentRequest $request)
    {
        //Placeモデルのインスタンスを作成
        $place = new Place();

        //インスタンスにフォーム内のデータを入れる
        //$place = $request->all();
        $place->user_id = Auth::user()->id; //登録ユーザーからidを取得
        $place->name = $request->name; //場所の名前
        $place->overview = $request->overview; //概要
        $place->placetype_id = $request->placetype_id; //登録先
        $place->attention_id = $request->attention_id; //関心度
        $place->postalcode = $request->postalcode; //郵便番号
        $place->pref = $request->pref; //都道府県
        $place->address = $request->address; //市区町村以下
        $place->phone = $request->phone; //電話番号
        $place->category_id = $request->category_id; //カテゴリー
        $place->url = $request->url; //URL
        $place->status = $request->status; //公開非公開

        //画像ファイルについて
        //アップロードしたファイルをファイルメソッドで取得。nullableにしたいため、第2引数にnull
        $files = $request->file('datafile', null);
        //idに投稿時間を入れる
        $place_id = time();
        if (isset($files)) {
            for($i = 0; $i < count($files); $i++) {
                //ファイルのマイムタイプを取得
                $mime = $files[$i] ->getClientMimeType();
                //マイムタイプを/の前後で分割し、fileMimes配列に入れる
                $fileMimes = explode('/', $mime);
                //配列の二つ目(image/jpegならjpegの部分)をファイルの拡張子としてfileExtに入れる
                $fileExt = $fileMimes[1];
                //ここまでの処理が無事完了したらログにメッセージを残す
                Log::debug($fileExt);
                //ファイル名の後ろに拡張子を付ける
                $file_name = 'image_'.($i+1) . '.' . $fileExt;

                // 縦横、1000pxに収まるように縮小したい
                $width = 1000;
                $height = 1000;
                $image = new Imagick($files[$i]->getPathname());
                // オリジナルのサイズ取得
                $width_org = $image->getImageWidth();
                $height_org = $image->getImageHeight();
                // 縮小比率を計算
                $ratio = $width_org / $height_org;
                //縦長だったら縦の長さを基準に横幅を縮小
                if ($width / $height > $ratio) {
                    $width = $height * $ratio;
                } else {
                //横長だったら横の長さを基準に
                    $height = $width / $ratio;
                }
                // 縮小実行
                
                $isSuccess = $image->scaleImage($width, $height);
                if($isSuccess !== true) {
                    dd('error');
                }

                //$files[$i]->storeAs("public/images/{$place->user_id}/{$place_id}", $file_name);
                $result = \File::makeDirectory(storage_path() . "/app/public/images/{$place->user_id}/{$place_id}", 0770, true);
                if($result !== true) {
                    dd('error');
                }
                $isSuccess = $image->writeImage(storage_path() . "/app/public/images/{$place->user_id}/{$place_id}/{$file_name}");
                if($isSuccess !== true) {
                    dd('error');
                }
                //public/images配下に投稿したユーザーのフォルダ、記事の投稿時間フォルダを作成し中に画像名を指定して保存
                //$file_name->storeAs("public/images/{$place->user_id}/{$place_id}", $file_name);
                //DBのカラム名を指定(datafile_の後ろに2桁で表される数値を代入，代入する数値は$i+1)→datafile_01~
                $fileColmunName = sprintf('datafile_%02d', ($i+1));
                //DBに画像のパスを保存
                $place->$fileColmunName =  "storage/images/{$place->user_id}/{$place_id}/{$file_name}";

                $image->clear();
                Log::debug('OK');
                }
        } else {
            //データがなければnull
            Log::debug('null');
            $place->datafile_01 = null;
            $place->datafile_02 = null;
            $place->datafile_03 = null;
            $place->datafile_04 = null;
        }
        // 投稿内容をDBに保存
        $place->save();

        //処理が終わったら記事一覧画面へリダイレクト
        return redirect('contents/content')->with('create_content_success', '投稿しました');
        //dd('stop');
    }

    //記事のidを取得
    public function show($id, Place $place)
    {
        //Placeテーブルから取得したidに合致するデータを取得
        $place = Place::find($id);
        //もし都道府県が登録されていたら同じ都道府県を登録されているカードを取得して表示
        if(isset($place->pref)){
            $query = Place::query();
            $places = $query->where('pref',$place->pref)->get();   
            //記事詳細画面を表示
            return view('contents.show', [
            'place' => $place,
            'places' => $places
            ]);
        }else{
            //記事詳細画面を表示
            return view('contents.show', [
                'place' => $place,
            ]);
        }
    }




   

}
/*   
                      $this->iiiiii();
                       private function iiiiii() {


    }

*/
     

    /*//files[][datafile]
        $files = $request->files('datafile', null);
    if (isset($files[0])) {
            for($i = 0; $i < count($files); $i++) {
                //ファイルのマイムタイプを取得
                $mime = $files[$i] ->getClientMimeType();
                //マイムタイプを/の前後で分割し、fileMimes配列に入れる
                $fileMimes = explode('/', $mime);
                //配列の二つ目(image/jpegならjpegの部分)をファイルの拡張子としてfileExtに入れる
                $fileExt = $fileMimes[1];
                //ここまでの処理が無事完了したらログにメッセージを残す
                Log::debug($fileExt);
                //ファイル名の後ろに拡張子を付ける
                $file_name = 'image_'. $i . '.' . $fileExt;
                //idに投稿時間を入れる
                $place_id = time();
                //public/images配下に投稿したユーザーのフォルダ、記事の投稿時間フォルダを作成し中に画像名を指定して保存
                $files[$i] -> storeAs("public/images/{$place->user_id}/{$place_id}", $file_name);
                //DBに画像のパスを保存
                $place->datafile()->datafile = "storage/images/{$place->user_id}/{$place_id}/{$file_name}";
                Log::debug('OK');
            }
        }
        $place->datafile()->datafile = null;
     */

    /*
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
            $file->storeAs("public/images/{$place->user_id}/{$place_id}", $file_name);
            //DBに画像のパスを保存
            $place->datafile = "storage/images/{$place->user_id}/{$place_id}/{$file_name}";
            Log::debug('OK');
*/
