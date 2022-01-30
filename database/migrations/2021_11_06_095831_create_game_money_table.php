<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_money', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->references('id')->on('lobbies')->onDelete('cascade');
            $table->integer('user1_money');
            $table->integer('user2_money');
            $table->integer('user3_money');
            $table->integer('user4_money');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_money');
    }
}
