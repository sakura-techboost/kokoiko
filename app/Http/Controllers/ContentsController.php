<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContentRequest;
use App\Place;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Log;

class ContentsController extends Controller
{
    
    //トップページを表示する
    public function top()
    {
        return view('contents.top');
    }
    //記事の一覧を表示する
    public function content()
    {
        $places = Place::all();
        $places = Place::paginate(5);

        return view('contents.content', ['places' => $places]);
    }

    //記事の編集画面を表示する
    public function edit($id, Place $place)
    {
        //Placeテーブルから取得したidに合致するデータを取得
        $place = Place::find($id);
        //idが一致しなければエラー画面を表示
        if (null === $place) {
            return response(redirect(url('/notfound')), 404);
        }
//    if ($place->user_id !== Auth::user()->id) {
//        return response(redirect(url('/notfound')), 404);
//    }
        return view('contents.edit', [
      'place_form' => $place,
      'id' => $id
    ]);
    }

    //記事のデータの上書をする
    public function update(CreateContentRequest $request, $id, Place $place)
    {
        $place_form = $request->all();
        $place = Place::find($id);
        //不要な「_token」の削除
        unset($place_form['_token']);
        //保存
        $place->fill($place_form)->save();
        //リダイレクト
        return redirect('contents/content')->with('edit_content_success', '編集しました');
    }

    //記事を削除する
    public function delete($id, Place $place)
    {
        // 該当する記事を取得
        $place = Place::find($id);
        //idが一致しなければエラー画面を表示
        if (null === $place) {
            return response(redirect(url('/notfound')), 404);
        }
        //削除する記事に画像ファイルがあったら
        if (null !== $place->datafile) {
            //サーバー上の画像を削除する
            //ファイルパスからファイル名を取得
            //storage/images/{$place->user_id}/{$place_id}/{$file_name}
            $file_pass = $place->datafile;
            $file_passes = explode('/', $file_pass);
            //配列の5つ目($file_name)を取得
            $del_file_name = $file_passes[4];
            //配列の4つ目($Place_idに代入してあるtime()の投稿時間)を取得
            $place_id = $file_passes[3];
            //public/images/{$place->user_id}/{$place_id}から画像ファイルを削除する
            Storage::delete("public/images/{$place->user_id}/{$place_id}/" . $del_file_name);
            //投稿時間フォルダも削除する
            Storage::deleteDirectory("public/images/{$place->user_id}/" . $place_id);
            // データベースのレコードを削除する
            $place->delete();
        } else {
            // なければそのままデータベースのレコードを削除する
            $place->delete();
        }

        return redirect('contents/content')->with('delete_content_success', '削除しました');
    }

    //エリアで探すページを表示する
    public function mapshow()
    {
        return view('contents.map', ['prefs' => self::$prefs]);
    }
    //新規投稿画面を表示する
    //→CreateContentController.php内に記述

    //記事詳細画面を表示する
    public function show()
    {
        return view('contents.show');
    }

    //public static $cities = ['01' =>$cities01];
  //  public function content() {
  //  return view('contents.content', ['prefs' => self::$prefs, 'cities' => self::$cities]);
  //}

  /**
   * public function testContent() {
   *  return view('contents.testContent', ['prefs' => self::$prefs]);
   * }
   */
}
