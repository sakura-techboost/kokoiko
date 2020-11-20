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
}
