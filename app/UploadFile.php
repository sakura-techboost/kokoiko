<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    //書き込み権限
    protected $fillable = ['place_id', 'datafile'];

    //所属モデルの宣言
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
