<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class SearchContentsController extends Controller
{
    //検索・一覧表示
    /*public function index(Request $request)
    {
        $search_name = $request->search_name;

        if ('' != $search_name) {
            // 検索されたら検索結果を取得する
            $places = Place::where('name', $search_name)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $places = Place::all();
        }


        return view('contents.content', ['places' => $places, 'search_name' => $search_name]);
    }
    */
    public function index(Request $request){
        $query = Place::query();
        //$request->input()で検索時に入力した項目を取得します。
        $search1 = $request->input('pref');
        $search2 = $request->input('category');
        $search3 = $request->input('kw');

         // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した棋力と一致するカラムを取得します
        if ($request->has('pref') && $search1 != ('指定なし')) {
            $query->where('pref', $search1)->get();
        }

         // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した好きな戦法と一致するカラムを取得します
        if ($request->has('category') && $search2 != ('指定なし')) {
            $query->where('category_id', $search2)->get();
        }

        // ユーザ名入力フォームで入力した文字列を含むカラムを取得します(案１)
        if ($request->has('kw') && $search3 != '') {
            $query->where('name', 'like', "%{$search3}%")
                  ->orWhere('overview', 'like', "%{$search3}%")
                  ->orWhere('address', 'like', "%{$search3}%")->get();
        }
        // ユーザ名入力フォームで入力した文字列を含むカラムを取得します(案２)
/*        if ($request->has('kw') && $search3 != '') {
            foreach(only(['name', 'overview','address']) as $key => $value){
              $query->where('$key', 'like', "%{$search3}%")->get();
            }
        }
*/
        //ユーザを1ページにつき5件ずつ表示させます
        $places = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('contents.content',[
            'places' => $places,
            'search1' => $search1,
            'search2' => $search2,
            'search3' => $search3
        ]);
    }
}
