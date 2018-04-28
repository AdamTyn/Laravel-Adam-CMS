<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbImgs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',20);
            $table->string('path',40);
            $table->datetime('time');
            $table->unsignedInteger('a_id');
            $table->foreign('a_id')->references('id')->on('tb_articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_imgs');
    }
}
