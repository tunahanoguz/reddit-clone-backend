<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicCommentComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_comment_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('complaint_categories');
            $table->string('body');
            $table->bigInteger('topic_comment_id')->unsigned();
            $table->foreign('topic_comment_id')->references('id')->on('topic_comments');
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
        Schema::dropIfExists('topic_comment_complaints');
    }
}
