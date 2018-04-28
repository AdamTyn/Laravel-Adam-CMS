<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',20)->unique();
            $table->string('email',20);
            $table->string('password',20);
            $table->tinyInteger('role')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->datetime('in_time');
            $table->datetime('out_time');
            $table->datetime('time');
            $table->string('in_ip',20);
            $table->string('out_ip',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_users');
    }
}
