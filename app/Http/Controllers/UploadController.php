<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //ファイルのアップロードフォーム(createContent.blade.php)を表示
    public function index(){
    	return view('contents.createContent');
    }
}
