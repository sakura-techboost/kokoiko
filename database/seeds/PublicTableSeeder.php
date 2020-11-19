<?php

use Illuminate\Database\Seeder;

class PublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //公開・非公開
        $publics = ['公開', '非公開'];

        foreach ($publics as $public) {
            DB::table('public')->insert('public');
        }
    }
}
