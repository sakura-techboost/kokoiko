<?php

use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     * ユーザーデータ
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            ['name' => 'sakura',
                'email' => 'sakura@yahoo.co.jp',
                'nickname' => 'Sakura',
                'password' => bcrypt('kokoiko1'),
            ],
            ['name' => 'test',
                'email' => 'test@yahoo.co.jp',
                'nickname' => 'テスト',
                'password' => bcrypt('kokoiko2'),
            ],
        ]);
    }
}
