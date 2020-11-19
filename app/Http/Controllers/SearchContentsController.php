<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class SearchContentsController extends Controller
{
    //検索・一覧表示
    public function index(Request $request)
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
}
