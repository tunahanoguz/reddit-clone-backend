<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('channels', 'TopicController@index');
Route::get('channels', 'TopicController@index');
Route::get('topics', 'TopicController@index');
Route::get('topics/{id}', 'TopicController@show');
Route::get('complaint-categories', 'ComplaintCategoryController@index');
Route::get('complaint-categories/{id}', 'ComplaintCategoryController@show');
Route::get('topic-comments', 'TopicCommentController@index');
Route::get('topic-comments/{id}', 'TopicCommentController@show');
Route::get('topic-comment-medias', 'TopicCommentController@index');
Route::get('topic-comment-medias/{id}', 'TopicCommentController@show');
Route::get('topic-comment-replies', 'TopicCommentReplyController@index');
Route::get('topic-comment-replies/{id}', 'TopicCommentReplyController@show');
Route::get('topic-comment-reply-medias', 'TopicCommentReplyMediaController@index');
Route::get('topic-comment-reply-medias/{id}', 'TopicCommentReplyMediaController@show');
Route::get('topic-comment-reply-votes', 'TopicCommentReplyVoteController@index');
Route::get('topic-comment-reply-votes/{id}', 'TopicCommentReplyVoteController@show');
Route::get('topic-comment-votes', 'TopicCommentVoteController@index');
Route::get('topic-comment-votes/{id}', 'TopicCommentVoteController@show');
Route::get('topic-medias', 'TopicMediaController@index');
Route::get('topic-medias/{id}', 'TopicMediaController@show');
Route::get('topic-votes', 'TopicVoteController@index');
Route::get('topic-votes/{id}', 'TopicVoteController@show');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('channels', 'ChannelRouter@store');
    Route::put('channels/{id}', 'ChannelRouter@update');
    Route::delete('channels/{id}', 'ChannelRouter@destroy');

    Route::apiResource('channel-complaints', 'ChannelComplaintController');

    Route::apiResource('channel-hidings', 'ChannelHidingController');

    Route::apiResource('channel-subscriptions', 'ChannelSubscriptionController');

    Route::post('complaint-categories', 'ComplaintCategoryController@store');
    Route::put('complaint-categories/{id}', 'ComplaintCategoryController@update');
    Route::delete('complaint-categories/{id}', 'ComplaintCategoryController@destroy');

    Route::post('topics', 'TopicController@store');
    Route::put('topics/{id}', 'TopicController@update');
    Route::delete('topics/{id}', 'TopicController@destroy');

    Route::post('topics', 'TopicCommentController@store');
    Route::put('topics/{id}', 'TopicCommentController@update');
    Route::delete('topics/{id}', 'TopicCommentController@destroy');

    Route::apiResource('topic-comment-complaints', 'TopicCommentComplaintController');

    Route::apiResource('topic-comment-hidings', 'TopicCommentHidingController');

    Route::post('topic-comment-medias', 'TopicCommentMediaController@store');
    Route::put('topic-comment-medias/{id}', 'TopicCommentMediaController@update');
    Route::delete('topic-comment-medias/{id}', 'TopicCommentMediaController@destroy');

    Route::post('topic-comment-replies', 'TopicCommentReplyController@store');
    Route::put('topic-comment-replies/{id}', 'TopicCommentReplyController@update');
    Route::delete('topic-comment-replies/{id}', 'TopicCommentReplyController@destroy');

    Route::apiResource('topic-comment-reply-complaints', 'TopicCommentReplyComplaintController');

    Route::post('topic-comment-replies', 'TopicCommentReplyController@store');
    Route::put('topic-comment-replies/{id}', 'TopicCommentReplyController@update');
    Route::delete('topic-comment-replies/{id}', 'TopicCommentReplyController@destroy');

    Route::apiResource('topic-comment-reply-complaints', 'TopicCommentReplyMediaController');

    Route::post('topic-comment-replies', 'TopicCommentReplyVoteController@store');
    Route::put('topic-comment-replies/{id}', 'TopicCommentReplyVoteController@update');
    Route::delete('topic-comment-replies/{id}', 'TopicCommentReplyVoteController@destroy');

    Route::apiResource('topic-comment-subscription', 'TopicCommentSubscriptionController');

    Route::post('topic-comment-votes', 'TopicCommentVoteController@store');
    Route::put('topic-comment-votes/{id}', 'TopicCommentVoteController@update');
    Route::delete('topic-comment-votes/{id}', 'TopicCommentVoteController@destroy');

    Route::apiResource('topic-complaints', 'TopicComplaintController');

    Route::apiResource('topic-hidings', 'TopicHidingController');

    Route::post('topic-medias', 'TopicMediaController@store');
    Route::put('topic-medias/{id}', 'TopicMediaController@update');
    Route::delete('topic-medias/{id}', 'TopicMediaController@destroy');

    Route::apiResource('topic-subscription', 'TopicSubscriptionController');

    Route::post('topic-votes', 'TopicVoteController@store');
    Route::put('topic-votes/{id}', 'TopicVoteController@update');
    Route::delete('topic-votes/{id}', 'TopicVoteController@destroy');
});


