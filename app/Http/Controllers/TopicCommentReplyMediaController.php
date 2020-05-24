<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentReplyMediaRequest;
use App\Http\Resources\MediaResource;
use App\TopicCommentReplyMedia;
use Illuminate\Http\Request;

class TopicCommentReplyMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_reply_medias = TopicCommentReplyMedia::paginate(5);
        return MediaResource::collection($topic_comment_reply_medias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicCommentReplyMediaRequest $request
     * @return MediaResource
     */
    public function store(TopicCommentReplyMediaRequest $request)
    {
        $topic_comment_reply_media = TopicCommentReplyMedia::create($request->all());
        return new MediaResource($topic_comment_reply_media);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return MediaResource
     */
    public function show($id)
    {
        $topic_comment_reply_media = TopicCommentReplyMedia::find($id);
        return new MediaResource($topic_comment_reply_media);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicCommentReplyMediaRequest $request
     * @param  int  $id
     * @return MediaResource
     */
    public function update(TopicCommentReplyMediaRequest $request, $id)
    {
        $topic_comment_reply_media = TopicCommentReplyMedia::find($id);
        $topic_comment_reply_media->update($request->all());
        return new MediaResource($topic_comment_reply_media);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentReplyMedia::destroy($id);

        return response()->json(['message' => 'Topic comment reply media was deleted succesfully.']);
    }
}
