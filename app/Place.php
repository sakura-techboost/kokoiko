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
        'datafile' 
    ];


}
