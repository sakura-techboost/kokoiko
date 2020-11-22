<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class SearchContentsController extends Controller
{

    public function index(Request $request){
        $query = Place::query();
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

        return view('contents.content',[
            'places' => $places,
            'search1' => $search1,
            'search2' => $search2,
            'search3' => $search3
        ]);
    }
}
