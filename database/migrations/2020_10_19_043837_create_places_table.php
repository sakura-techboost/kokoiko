<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 投稿記事のテーブル
 * Class CreatePlacesTable
 */
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
            $table->bigInteger('user_id'); //誰が投稿したかわかるようにする
            $table->string('name');
            $table->text('overview');
            $table->integer('placetype_id'); //登録先をテーブル化してIDでとってくる
            $table->integer('attention_id'); //関心度
            $table->string('postalcode')->nullable(); //郵便番号
            $table->string('pref')->nullable(); //都道府県コード
            $table->string('address')->nullable(); //住所入力欄
            $table->string('phone')->nullable(); //電話番号
            $table->integer('category_id')->nullable(); //カテゴリ
            $table->text('url')->nullable(); //ホームページのurl
            $table->integer('status'); //公開非公開設定
            $table->string('datafile_01')->nullable(); //画像のパス
            $table->string('datafile_02')->nullable(); //画像のパス
            $table->string('datafile_03')->nullable(); //画像のパス
            $table->string('datafile_04')->nullable(); //画像のパス
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
