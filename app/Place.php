<?php

namespace App;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

//use Kyslik\ColumnSortable\Sortable;// 追加

/**
 * Class Place
 * @package App
 * @method static find(int $id)
 * @method static orderBy(string $string, string $string1)
 */
class Place extends Model
{

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
        'datafile_01',
        'datafile_02',
        'datafile_03',
        'datafile_04',
    ];
    /*
        //画像ファイルを以下のテーブルに保存
        public function datafile()
        {
            return $this->hasMany('App\UploadFile');
        }
    */

    /**
     * Configファイルから関心度の値を取得
     * @return Repository|Application|mixed
     */
    public function getAttentionStarAttribute()
    {
        return config('place.attention.' . $this->attention_id);
    }

    /**
     * Configファイルから保存先の値を取得
     * @return Repository|Application|mixed
     */
    public function getPlaceTypeAttribute()
    {
        return config('place.placetype.' . $this->placetype_id);
    }

    /**
     * Configファイルからカテゴリーの値を取得
     * @return Repository|Application|mixed
     */
    public function getCategoryAttribute()
    {
        return config('place.category.' . $this->category_id);
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
