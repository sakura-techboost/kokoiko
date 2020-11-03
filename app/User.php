<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','kana','nickname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * IDから一件のデータを取得する
     */
    public function selectUserFindById($id)
    {
        // 「SELECT id, name, kana,nickname,email WHERE id = ?」を発行する
        $query = $this->select([
            'id','name','nickname','email'
        ])->where([
            'id' => $id
        ]);
        // first()は1件のみ取得する関数
        return $query->first();
    }
}
