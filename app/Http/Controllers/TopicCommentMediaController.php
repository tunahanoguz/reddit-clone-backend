<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentMediaRequest;
use App\Http\Resources\MediaResource;
use App\TopicCommentMedia;
use Illuminate\Http\Request;

class TopicCommentMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_medias = TopicCommentMedia::paginate(5);
        return MediaResource::collection($topic_comment_medias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicCommentMediaRequest  $request
     * @return MediaResource
     */
    public function store(TopicCommentMediaRequest $request)
    {
        $topic_comment_media = TopicCommentMedia::create($request->all());
        return new MediaResource($topic_comment_media);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return MediaResource
     */
    public function show($id)
    {
        $topic_comment_media = TopicCommentMedia::find($id);
        return new MediaResource($topic_comment_media);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return MediaResource
     */
    public function update(Request $request, $id)
    {
        $topic_comment_media = TopicCommentMedia::find($id);
        $topic_comment_media->update($request->all());

        return new MediaResource($topic_comment_media);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentMedia::destroy($id);

        return response()->json(['message' => 'Topic comment media was deleted successfully.']);
    }
}
