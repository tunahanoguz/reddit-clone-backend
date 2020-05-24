<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicVoteRequest;
use App\Http\Resources\VoteResource;
use App\TopicVote;
use Illuminate\Http\Request;

class TopicVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_votes = TopicVote::all();
        return VoteResource::collection($topic_votes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicVoteRequest $request
     * @return VoteResource
     */
    public function store(TopicVoteRequest $request)
    {
        $topic_vote = TopicVote::create($request->all());
        return new VoteResource($topic_vote);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return VoteResource
     */
    public function show($id)
    {
        $topic_vote = TopicVote::find($id);
        return new VoteResource($topic_vote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicVoteRequest $request
     * @param  int  $id
     * @return VoteResource
     */
    public function update(TopicVoteRequest $request, $id)
    {
        $topic_vote = TopicVote::find($id);
        $topic_vote->update($request->all());

        return new VoteResource($topic_vote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicVote::destroy($id);

        return response()->json(['message' => 'Topic vote was deleted successfully.']);
    }
}
