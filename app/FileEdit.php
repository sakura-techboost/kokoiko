<?php

namespace App;

use App\Http\Requests\CreateContentRequest;
use App\Place;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Imagick;
use Log;

class FileEdit
{
  public function mimeType($file){
    //ファイルのマイムタイプを取得
    $mime = $file ->getClientMimeType();
    //マイムタイプを/の前後で分割し、fileMimes配列に入れる
    $fileMimes = explode('/', $mime);
    //配列の二つ目(image/jpegならjpegの部分)をファイルの拡張子としてfileExtに入れる
    $fileExt = $fileMimes[1];
    //ここまでの処理が無事完了したらログにメッセージを残す
    Log::debug($fileExt);
    //$fileExtを返す
    return $fileExt;
  }
}
