<?php

use Illuminate\Database\Seeder;

class PlacetypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //登録先
        $placetypes = ['お気に入り', '行ってみたい', 'いまいち'];

        foreach ($placetypes as $placetype) {
            DB::table('placetype')->insert('placetype');
        }
    }
}
