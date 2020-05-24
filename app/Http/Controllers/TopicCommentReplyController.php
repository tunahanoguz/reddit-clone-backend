<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentReplyRequest;
use App\Http\Resources\TopicCommentReplyResource;
use App\TopicCommentReply;
use Illuminate\Http\Request;

class TopicCommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_replies = TopicCommentReply::paginate(5);
        return TopicCommentReplyResource::collection($topic_comment_replies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicCommentReplyRequest $request
     * @return TopicCommentReplyResource
     */
    public function store(TopicCommentReplyRequest $request)
    {
        $topic_comment_reply = TopicCommentReply::create($request->all());
        return new TopicCommentReplyResource($topic_comment_reply);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TopicCommentReplyResource
     */
    public function show($id)
    {
        $topic_comment_reply = TopicCommentReply::find($id);
        return new TopicCommentReplyResource($topic_comment_reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return TopicCommentReplyResource
     */
    public function update(Request $request, $id)
    {
        $topic_comment_reply = TopicCommentReply::find($id);
        $topic_comment_reply->update($request->all());

        return new TopicCommentReplyResource($topic_comment_reply);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentReply::destroy($id);

        return response()->json(['message' => 'Topic comment reply was deleted successfully.']);
    }
}
