<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',20);
            $table->string('option',200);
            $table->unsignedInteger('u_id');
            $table->foreign('u_id')->references('id')->on('tb_users');
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
       Schema::dropIfExists('tb_logs');
    }
}
