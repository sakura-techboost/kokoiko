<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Kyslik\ColumnSortable\Sortable;// 追加

class Place extends Model
{
    //use Sortable;
    //public $sortable = ['id', 'name', 'attention_id', 'updated_at'];// 追加
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'overview',
        'placetype_id',
        'attention_id',
        'postalcode',
        'pref',
        'address',
        'phone',
        'category_id',
        'url',
        'status', 

    ];
/*
    //画像ファイルを以下のテーブルに保存
    public function datafile()
    {
        return $this->hasMany('App\UploadFile');
    }
*/
    //Configファイルから値を取得
    //関心度
    public function getAttentionStarAttribute()
    {
        return config('place.attention.' . $this->attention_id);
    }
    //保存先
    public function getPlaceTypeAttribute()
    {
        return config('place.placetype.' . $this->placetype_id);
    }
    //カテゴリー
    public function getCategoryAttribute()
    {
        return config('places.place.category.' . $this->category_id);
    }
}
