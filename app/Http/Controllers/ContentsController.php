<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContentRequest;
use App\Place;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Log;

/**
 *
 * aaaaをするこんなトローラー
 *
 * Class ContentsController
 *
 * @package App\Http\Controllers
 */
class ContentsController extends Controller
{

    /**
     * トップページを表示する
     *
     * @return Application|Factory|View
     */
    public function top()
    {
        return view('contents.top');
    }

    /**
     * 記事の一覧を表示する
     *
     * @return Application|Factory|View
     */
    public function content()
    {
        $user = Auth::user();
        $places = Place::where('user_id',$user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $msg = '全'.$places->total().'件';
        $kw = '';
        $prf = '';
        $ctg = '';

        return view('contents.content', [
            'places' => $places,
            'user' => $user,
            'msg' => $msg,
            'kw' => $kw,
            'prf' => $prf,
            'ctg' => $ctg,
            ]);
    }


    /**
     * 記事の編集画面を表示する
     *
     * @param int|string $id コンテンツID
     * @param Place $place
     *
     * @return Application|ResponseFactory|Factory|Response|View
     */
    public function edit($id, Place $place)
    {
        $user = Auth::user();

        //Placeテーブルから取得したidに合致するデータを取得
        $place = Place::find($id);

        //idが一致しなければエラー画面を表示
        if (null === $place) {
            return response(redirect(url('/notfound')), 404);
        }

        return view('contents.edit', [
            'place_form' => $place,
            'id' => $id,
            'user' => $user
        ]);
    }

    //

    /**
     * 記事のデータの上書をする
     *
     * @param CreateContentRequest $request
     * @param $id
     * @param Place $place
     * @return Application|RedirectResponse|Redirector
     */
    public function update(CreateContentRequest $request, $id, Place $place)
    {
        $place_form = $request->all();
        $place = Place::find($id);

        //不要な「_token」の削除
        unset($place_form['_token']);

        //保存
        $place->fill($place_form)->update();

        //リダイレクト
        return redirect('contents/content')->with('edit_content_success', '編集しました');
    }

    /**
     * 記事を削除する
     *
     * @param $id
     * @param Place $place
     * @return Application|ResponseFactory|RedirectResponse|Response|Redirector
     */
    public function delete($id, Place $place)
    {
        // 該当する記事を取得
        $place = Place::find($id);

        //idが一致しなければエラー画面を表示
        if (null === $place) {
            return response(redirect(url('/notfound')), 404);
        }

        //もし画像ファイルが一つでも存在したら
        if (isset($place->datafile_01)) {
            /**
             * 以下のファイルパスから画像が入っているディレクトリ名を取得
             * storage/images/{$place->user_id}/{$place_id}/{$file_name}
             */
            $file_pass = $place->datafile_01;
            $file_passes = explode('/', $file_pass);
            //配列の4つ目($Place_idに代入してあるtime()の投稿時間)を取得
            $place_id = $file_passes[3];
            $files = [$place->datafile_01, $place->datafile_02, $place->datafile_03, $place->datafile_04];

            //サーバー上のデータを削除
            foreach ($files as $file) {

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

                } else {
                    //画像ファイルが入っていたディレクトリを削除
                    Storage::deleteDirectory("public/images/{$place->user_id}/" . $place_id);
                }

            }

            // データベースのレコードを削除する
            $place->delete();
        } else {
            // なければそのままデータベースのレコードを削除する
            $place->delete();
        }

        return redirect('contents/content')->with('delete_content_success', '削除しました');
    }

}

