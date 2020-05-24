<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentReplyVoteRequest;
use App\Http\Resources\VoteResource;
use App\TopicCommentReplyVote;
use Illuminate\Http\Request;

class TopicCommentReplyVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_reply_votes = TopicCommentReplyVote::paginate(5);
        return VoteResource::collection($topic_comment_reply_votes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicCommentReplyVoteRequest $request
     * @return VoteResource
     */
    public function store(TopicCommentReplyVoteRequest $request)
    {
        $topic_comment_reply_vote = TopicCommentReplyVote::create($request->all());
        return new VoteResource($topic_comment_reply_vote);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return VoteResource
     */
    public function show($id)
    {
        $topic_comment_reply_vote = TopicCommentReplyVote::find($id);
        return new VoteResource($topic_comment_reply_vote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicCommentReplyVoteRequest $request
     * @param  int  $id
     * @return VoteResource
     */
    public function update(TopicCommentReplyVoteRequest $request, $id)
    {
        $topic_comment_reply_vote = TopicCommentReplyVote::find($id);
        $topic_comment_reply_vote->update($request->all());
        return new VoteResource($topic_comment_reply_vote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentReplyVote::destroy($id);

        return response()->json(['message' => 'Topic comment reply vote was deleted successfully.']);
    }
}
