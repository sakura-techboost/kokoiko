<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');//誰が投稿したかわかるようにする
            $table->string('name');
            $table->text('url')->nullable();//ホームページのurl
            $table->text('overview');
            $table->integer('placetype_id');//登録先をテーブル化してIDでとってくる
            $table->integer('pref_id')->nullable();//都道府県コード
            $table->integer('city_id')->nullable();//市町村コード
            $table->string('postalcode')->nullable();//郵便番号
            $table->string('address')->nullable;//番地等入力欄
            $table->string('phone')->nullable();//電話番号
            $table->integer('attention_id')->nullable();//関心度
            $table->integer('public_id');//公開非公開設定
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
