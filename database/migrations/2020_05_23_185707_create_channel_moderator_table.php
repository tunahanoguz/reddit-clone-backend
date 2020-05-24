<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelModeratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_moderator', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('moderator_id')->unsigned();
            $table->foreign('moderator_id')->references('id')->on('users');
            $table->bigInteger('channel_id')->unsigned();
            $table->foreign('channel_id')->references('id')->on('channels');
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
        Schema::dropIfExists('channel_moderator');
    }
}
