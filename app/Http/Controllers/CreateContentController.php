<?php
namespace App\Http\Controllers;
use App\Http\Requests\CreateContentRequest;
use App\Place; //Placeモデルを使う
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Imagick;
use Log;

class CreateContentController extends Controller
{
    /**
     * 新規投稿画面を表示する
     * @return Application|Factory|View
     */

    public function showCreateForm()
    {
        $user = Auth::user();
        return view('contents.createContent', ['user' => $user]);
    }

    /**
     * 記事を作成する
     * @param CreateContentRequest $request 記事に関するバリデーション
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \ImagickException
     */

    public function createContent(CreateContentRequest $request)
    {
        //Placeモデルのインスタンスを作成
        $place = new Place();

        //インスタンスにフォーム内のデータを入れる
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

        /**
         * 画像ファイルについて
         * アップロードしたファイルをファイルメソッドで取得。nullableにしたいため、第2引数にnull
         */

        $files = $request->file('datafile', null);
        //idに投稿時間を入れる
        $place_id = time();

        /**
         * フォーム内に画像データが存在した際の処理
         */
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
                
                if($width_org > 1000 || $height_org > 1000){
                    $ratio = $width_org / $height_org;

                    if ($width / $height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width / $ratio;
                    }
    
                    $isSuccess = $image->scaleImage($width, $height);
                    if($isSuccess !== true) {
                        dd('error');
                    }
                }
                
                /**
                 * public/images配下に投稿したユーザーのフォルダ、記事の投稿時間フォルダを作成し中に画像名を指定して保存
                 * 画像を保存するディレクトリを作成し、そこへ縮小した画像を保存する
                 * Imagickを使用せずそのままのデータをLaravelでディレクトリに保存する場合は以下
                 * $files[$i]->storeAs("public/images/{$place->user_id}/{$place_id}", $file_name);
                 */
                if($i == 0){
                    $makeDir = \File::makeDirectory(storage_path() . "/app/public/images/{$place->user_id}/{$place_id}", 0770, true);
                    if($makeDir !== true) {
                        dd('error');
                    }
                }

                $saveImg = $image->writeImage(storage_path() . "/app/public/images/{$place->user_id}/{$place_id}/{$file_name}");
                if($saveImg !== true) {
                    dd('error');
                }
                $image->clear();
                //public/images配下に投稿したユーザーのフォルダ、記事の投稿時間フォルダを作成し中に画像名を指定して保存
                //DBのカラム名を指定(datafile_の後ろに2桁で表される数値を代入，代入する数値は$i+1)→datafile_01~
                $fileColmunName = sprintf('datafile_%02d', ($i+1));
                //DBに画像のパスを保存
                $place->$fileColmunName =  "storage/images/{$place->user_id}/{$place_id}/{$file_name}";
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

        $place->save();

        return redirect('contents/content')->with('create_content_success', '投稿しました');

    }
    /**
     * 選択された記事のidを取得し、一致する記事を表示
     * @param $id
     * @param Place $place
     * @return Application|Factory|View
     */
    public function show($id, Place $place)
    {
        $user = Auth::user();
        //Placeテーブルから取得したidに合致するデータを取得
        $place = Place::find($id);

        //もし都道府県が登録されていたら同じ都道府県を登録されているカードを取得して表示
        if(isset($place->pref)){
            $query = Place::query();
            $query->where('pref',$place->pref)->get();
            $places = $query->paginate(5);
            $msg = '全'.$places->total().'件';
            //記事詳細画面を表示
            return view('contents.show', [
            'place' => $place,
            'places' => $places,
            'user' => $user,
            'msg' => $msg
            ]);

        }else{
            //記事詳細画面を表示
            return view('contents.show', [
                'place' => $place,
                'user' => $user
            ]);
        }
    }

}
