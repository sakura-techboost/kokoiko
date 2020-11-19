<?php

use Illuminate\Database\Seeder;

class AttentionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //関心度
        $attentions = ['★★★★★',
                     '★★★★☆',
                     '★★★☆☆',
                     '★★☆☆☆',
                     '★☆☆☆☆'
                    ];

        foreach ($attentions as $attention) {
            DB::table('attention')->insert('attention');
        }
    }
}
