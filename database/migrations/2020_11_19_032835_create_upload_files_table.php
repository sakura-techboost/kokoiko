<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            //idを整数値のみに限定して登録できる上限を増やす(place_idは整数値のみであるはずだから)
            //カラムの作成
            $table->integer('place_id')->unsigned();
            
            /* placeテーブルに一致するidが存在する場合のみ保存できるようにする
             * 1.upload_fileの外部キー(子カラム名)
             * 2.親カラム(place)の参照キー/
             * 3.親カラムが削除されたら子カラムも削除
             * 4.親カラムが更新されたら子カラムも更新
             */
/*
             $table->foreign('place_id')
            ->references('id')->on('places')
            ->onDelete('cascade')
            ->onUpdate('cascade');
*/            
            //画像のパス
            $table->string('datafile')->nullable();
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
        Schema::dropIfExists('upload_files');
    }
}
