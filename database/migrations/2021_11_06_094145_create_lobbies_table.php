<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lobbies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user1_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user2_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user3_id')->unsigned()->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user4_id')->unsigned()->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('winner_id')->unsigned()->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('token');
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
        Schema::dropIfExists('lobbies');
    }
}
