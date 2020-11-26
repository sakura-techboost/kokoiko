<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Auth;
use Illuminate\View\View;

/**
 * 検索機能に関するコントローラー
 * Class SearchContentsController
 * @package App\Http\Controllers
 */
class SearchContentsController extends Controller
{
    /**
     * キーワードやカテゴリなどによる検索結果を取得する
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request){
        $user = Auth::user();
        $query = Place::query()->where('user_id',$user->id);
        //$request->input()で検索時に入力した項目を取得します。
        $search1 = $request->input('pref');
        $search2 = $request->input('category');
        $search3 = $request->input('kw');

         // 指定なし以外を選択した場合、$query->whereで選択した都道府県と一致するカラムを取得
        if ($request->has('pref') && $search1 != ('指定なし')) {
            $query->where('pref', $search1)->get();
        }

         // 指定なし以外を選択した場合、$query->whereで選択したカテゴリーと一致するカラムを取得
        if ($request->has('category') && $search2 != ('指定なし')) {
            $query->where('category_id', $search2)->get();
        }

        // キーワードフォームで入力した文字列を含むカラムを取得(案１)
        if ($request->has('kw') && $search3 != '') {
            $query->where('name', 'like', "%{$search3}%")
                  ->orWhere('overview', 'like', "%{$search3}%")
                  ->orWhere('address', 'like', "%{$search3}%")->get();
        }
        // キーワードフォームで入力した文字列を含むカラムを取得(案２)
/*        if ($request->has('kw') && $search3 != '') {
            foreach(only(['name', 'overview','address']) as $key => $value){
              $query->where('$key', 'like', "%{$search3}%")->get();
            }
        }
*/
        //該当記事を降順に1ページにつき5件ずつ表示
        $places = $query->orderBy('created_at', 'desc')->paginate(5);
        $msg = '全'.$places->total().'件';
        $kw = 'キーワード：'.$search3;
        $prf = '都道府県：'.$search1.' / ';
        $ctg = 'カテゴリー：'.$search2;

        return view('contents.content',[
            'user' => $user,
            'places' => $places,
            'kw' => $kw,
            'prf' => $prf,
            'ctg' => $ctg,
            'msg' => $msg
        ]);
    }

    /**
     * 都道府県ごとの記事表示を行う
     * @param Request $request
     * @return Application|Factory|View
     */
    public function mapindex(Request $request){
        $user = Auth::user();
        $query = Place::query()->where('user_id',$user->id);

        $search_pref = $request->input('pref');
         // $query->whereで選択した都道府県と一致するカラムを取得
         if ($request->has('pref')) {
            $query->where('pref', $search_pref)->get();
            $places = $query->paginate(5);
            $msg = '全'.$places->total().'件';

            return view('contents.map',[
                'search_pref' => $search_pref,
                'user' => $user,
                'places' => $places,
                'msg' => $msg
            ]);
        }

    }
}
