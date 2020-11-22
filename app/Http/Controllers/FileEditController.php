<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContentRequest;
use App\Place;
use Illuminate\Support\Facades\Storage;
use Imagick;

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
    //画像のデータの上書をする
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
                    //画像ファイルが入っていたディレクトリを削除
                    Storage::deleteDirectory("public/images/{$place->user_id}/" . $place_id);                    
                } 
            }
        }
        //アップロードしたファイルをファイルメソッドで取得。nullableにしたいため、第2引数にnull
        $files = $request->file('datafile', null);
        //idに投稿時間を入れる
        $place_id = time();
        if (isset($files)) {
            for($i = 0; $i < 4; $i++) {
                //ファイルのマイムタイプを取得
                if(isset($files[$i])){
                    $mime = $files[$i] ->getClientMimeType();
                    //マイムタイプを/の前後で分割し、fileMimes配列に入れる
                    $fileMimes = explode('/', $mime);
                    //配列の二つ目(image/jpegならjpegの部分)をファイルの拡張子としてfileExtに入れる
                    $fileExt = $fileMimes[1];
                    //ファイル名の後ろに拡張子を付ける
                    $file_name = 'image_'.($i+1) . '.' . $fileExt;
                    /**
                     * 以下Imagickを用いて画像を縮小して保存する
                     * 
                     * 縦横、1000pxに収まるように縮小
                     * オリジナルのサイズ取得
                     * 縮小比率を、縦横長い方の長さを基準に縮小するように計算
                     * 縮小を実行
                     */
                    $width = 1000;
                    $height = 1000;
                    $image = new Imagick($files[$i]->getPathname());
                    $width_org = $image->getImageWidth();
                    $height_org = $image->getImageHeight();
                    $ratio = $width_org / $height_org;
                    if ($width / $height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width / $ratio;
                    }
                    $resize = $image->scaleImage($width, $height);
                    if($resize !== true) {
                        dd('error');
                    }
                    /**
                     * public/images配下に投稿したユーザーのフォルダ、記事の投稿時間フォルダを作成し中に画像名を指定して保存
                     * 画像を保存するディレクトリを作成し、そこへ縮小した画像を保存する
                     * Imagickを使用せずそのままのデータをLaravelでディレクトリに保存する場合は以下
                     * $files[$i]->storeAs("public/images/{$place->user_id}/{$place_id}", $file_name);
                     */
                    $makeDir = \File::makeDirectory(storage_path() . "/app/public/images/{$place->user_id}/{$place_id}", 0770, true);
                    if($makeDir !== true) {
                        dd('error');
                    }
                    $saveImg = $image->writeImage(storage_path() . "/app/public/images/{$place->user_id}/{$place_id}/{$file_name}");
                    if($saveImg !== true) {
                        dd('error');
                    }
                    $image->clear();
                    /**
                     * DBのカラム名を以下のように指定
                     * (datafile_の後ろに2桁で表される数値を代入，代入する数値は$i+1)→datafile_01~
                     * DBに画像のパスを保存
                     */
                    $fileColmunName = sprintf('datafile_%02d', ($i+1));
                    $place->$fileColmunName =  "storage/images/{$place->user_id}/{$place_id}/{$file_name}";
                }else{
                    //DBのカラム名を指定(datafile_の後ろに2桁で表される数値を代入，代入する数値は$i+1)→datafile_01~
                    $fileColmunName = sprintf('datafile_%02d', ($i+1));
                    $place->$fileColmunName = null;
                }
            }
        } else {
            //データがなければnull
            $place->datafile_01 = null;
            $place->datafile_02 = null;
            $place->datafile_03 = null;
            $place->datafile_04 = null;
        }
        //不要な「_token」の削除
        unset($place_form['_token']);        
        $place->fill($place_form)->update();
        //リダイレクト
        return redirect('contents/content')->with('edit_content_success', '編集しました');
    }

    //画像の編集画面を表示する
    public function testEditFile()
    {
        
        return view('contents.testEditFile');
    }
}
