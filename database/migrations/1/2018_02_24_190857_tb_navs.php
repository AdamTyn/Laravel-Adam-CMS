<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbNavs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_navs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',20);
            $table->string('redirect',20);
            $table->unsignedInteger('p_id');
            $table->foreign('p_id')->references('id')->on('tb_pages');
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
        Schema::dropIfExists('tb_navs');
    }
}
