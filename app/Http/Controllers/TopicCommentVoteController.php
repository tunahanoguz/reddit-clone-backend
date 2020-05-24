<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentRequest;
use App\Http\Resources\VoteResource;
use App\TopicCommentVote;
use Illuminate\Http\Request;

class TopicCommentVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_votes = TopicCommentVote::paginate(5);
        return VoteResource::collection($topic_comment_votes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return VoteResource
     */
    public function store(TopicCommentRequest $request)
    {
        $topic_comment_vote = TopicCommentVote::create($request->all());
        return new VoteResource($topic_comment_vote);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return VoteResource
     */
    public function show($id)
    {
        $topic_comment_vote = TopicCommentVote::find($id);
        return new VoteResource($topic_comment_vote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicCommentRequest $request
     * @param  int  $id
     * @return VoteResource
     */
    public function update(TopicCommentRequest $request, $id)
    {
        $topic_comment_vote = TopicCommentVote::find($id);
        $topic_comment_vote->update($request->all());
        return new VoteResource($topic_comment_vote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentVote::destroy($id);
        return response()->json(['message' => 'Topic comment vote was deleted successfully.']);
    }
}
