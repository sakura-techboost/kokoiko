<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContentRequest;
use App\Place;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileEditController extends Controller
{
    //
    //画像の編集画面を表示する
    public function fileEdit($id, Place $place)
    {
        //Placeテーブルから取得したidに合致するデータを取得
        $place = Place::find($id);
        //idが一致しなければエラー画面を表示
        if (null === $place) {
            return response(redirect(url('/notfound')), 404);
        }
        return view('contents.fileEdit', [
            'place_form' => $place,
            'id' => $id
        ]);
    }
    //記事のデータの上書をする
    public function update(CreateContentRequest $request, $id, Place $place)
    {
        $place_form = $request->all();
        $place = Place::find($id);
        //もし元の記事に画像ファイルが一つでも存在したら
        if(isset($place->datafile_01)){
            /**
             * 以下のファイルパスから画像が入っているディレクトリ名を取得
             * storage/images/{$place->user_id}/{$place_id}/{$file_name}
             */
            $file_pass = $place->datafile_01;
            $file_passes = explode('/', $file_pass);
            //配列の4つ目($Place_idに代入してあるtime()の投稿時間)を取得
            $place_id = $file_passes[3];
            $files = [$place->datafile_01,$place->datafile_02,$place->datafile_03,$place->datafile_04];
            //サーバー上のデータを削除
            foreach($files as $file){
                if (null !== $file) {
                    //ファイルパスからファイル名を取得
                    //storage/images/{$place->user_id}/{$place_id}/{$file_name}
                    $file_pass = $file;
                    $file_passes = explode('/', $file_pass);
                    //配列の5つ目($file_name)を取得
                    $del_file_name = $file_passes[4];
                    //配列の4つ目($Place_idに代入してあるtime()の投稿時間)を取得
                    $place_id = $file_passes[3];
                    //public/images/{$place->user_id}/{$place_id}から画像ファイルを削除する
                    Storage::delete("public/images/{$id}/{$place_id}/" . $del_file_name);
                }else{
                    break;
                } 
            }
            //画像ファイルが入っていたディレクトリを削除
            Storage::deleteDirectory("public/images/{$place->user_id}/" . $place_id);
        }
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
                //ファイル名の後ろに拡張子を付ける
                $file_name = 'image_'.($i+1) . '.' . $fileExt;
                //public/images配下に投稿したユーザーのフォルダ、記事の投稿時間フォルダを作成し中に画像名を指定して保存
                $files[$i] -> storeAs("public/images/{$place->user_id}/{$place_id}", $file_name);
                //DBのカラム名を指定(datafile_の後ろに2桁で表される数値を代入，代入する数値は$i+1)→datafile_01~
                $fileColmunName = sprintf('datafile_%02d', ($i+1));
                //DBに画像のパスを保存
                $place->$fileColmunName =  "storage/images/{$place->user_id}/{$place_id}/{$file_name}";
                }
        } else {
            //データがなければnull
            $place->datafile_01 = null;
            $place->datafile_02 = null;
            $place->datafile_03 = null;
            $place->datafile_04 = null;
        }
        //保存
        //不要な「_token」の削除
        unset($place_form['_token']);        
        $place->fill($place_form)->save();
        //リダイレクト
        return redirect('contents/content')->with('edit_content_success', '編集しました');
    }
}
