<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Todo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        //テーブル作成
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_name');
            $table->integer('price');
            $table->date('date');
            $table->string('imageurl');
            $table->string('url');
            $table->string('meritto');
            $table->string('demeritto');
            $table->integer('hosii');
            $table->integer('hitsuyou');

            $table->timestamps();
        });
    }

    public function down(){
        //テーブル削除
        Schema::dropIfExists('tasks');
    }
}