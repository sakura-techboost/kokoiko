<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //市区町村配列
        //ajaxzip3からとってきてはどうか
        foreach ($cities as $city){
            DB::table('city')->insert('city');
        }
    }
}
