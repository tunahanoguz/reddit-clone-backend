<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentRequest;
use App\Http\Resources\TopicCommentResource;
use App\TopicComment;
use Illuminate\Http\Request;

class TopicCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comments = TopicComment::paginate(5);
        return TopicCommentResource::collection($topic_comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicCommentRequest $request
     * @return TopicCommentResource
     */
    public function store(TopicCommentRequest $request)
    {
        $topic_comment = TopicComment::create($request->all());
        return new TopicCommentResource($topic_comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TopicCommentResource
     */
    public function show($id)
    {
        $topic_comment = TopicComment::find($id);
        return new TopicCommentResource($topic_comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return TopicCommentResource
     */
    public function update(Request $request, $id)
    {
        $topic_comment = TopicComment::find($id);
        $topic_comment->update($request->all());

        return new TopicCommentResource($topic_comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicComment::destroy($id);

        return response()->json(['message' => 'Topic comment was deleted successfully.']);
    }
}
