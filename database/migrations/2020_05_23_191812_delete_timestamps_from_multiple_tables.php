<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteTimestampsFromMultipleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_complaints', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('channel_hidings', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('channel_subscriptions', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_comments', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_comment_complaints', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_comment_hidings', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_comment_replies', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_comment_reply_complaints', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_comment_reply_votes', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_comment_subscriptions', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_comment_votes', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_hidings', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_subscriptions', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('topic_votes', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('multiple_tables', function (Blueprint $table) {
            //
        });
    }
}
