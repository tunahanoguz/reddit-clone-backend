<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentHidingRequest;
use App\Http\Resources\HidingResource;
use App\TopicCommentHiding;
use Illuminate\Http\Request;

class TopicCommentHidingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_hidings = TopicCommentHiding::paginate(5);
        return HidingResource::collection($topic_comment_hidings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicCommentHidingRequest  $request
     * @return HidingResource
     */
    public function store(TopicCommentHidingRequest $request)
    {
        $topic_comment_hiding = TopicCommentHiding::create($request->all());
        return new HidingResource($topic_comment_hiding);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TopicCommentHiding
     */
    public function show($id)
    {
        $topic_comment_hiding = TopicCommentHiding::find($id);
        return new TopicCommentHiding($topic_comment_hiding);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicCommentHidingRequest  $request
     * @param  int  $id
     * @return HidingResource
     */
    public function update(TopicCommentHidingRequest $request, $id)
    {
        $topic_comment_hiding = TopicCommentHiding::find($id);
        $topic_comment_hiding->update($request->all());

        return new HidingResource($topic_comment_hiding);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentHiding::destroy($id);
        return response()->json(['message' => 'Topic comment hiding was deleted successfully.']);
    }
}
