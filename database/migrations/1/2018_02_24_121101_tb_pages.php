<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short',20);
            $table->unsignedInteger('top');
            $table->unsignedInteger('center');
            $table->unsignedInteger('bottom');
            $table->foreign('center')->references('id')->on('tb_articles');
            $table->foreign('bottom')->references('id')->on('tb_articles');
            $table->foreign('top')->references('id')->on('tb_articles');
            $table->datetime('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pages');
    }
}
