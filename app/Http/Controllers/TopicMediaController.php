<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicMediaRequest;
use App\Http\Resources\MediaResource;
use App\TopicMedia;
use Illuminate\Http\Request;

class TopicMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_medias = TopicMedia::all();
        return MediaResource::collection($topic_medias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicMediaRequest $request
     * @return MediaResource
     */
    public function store(TopicMediaRequest $request)
    {
        $topic_media = TopicMedia::create($request->all());
        return new MediaResource($topic_media);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return MediaResource
     */
    public function show($id)
    {
        $topic_media = TopicMedia::find($id);
        return new MediaResource($topic_media);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicMediaRequest $request
     * @param  int  $id
     * @return MediaResource
     */
    public function update(TopicMediaRequest $request, $id)
    {
        $topic_media = TopicMedia::find($id);
        $topic_media->update($request->all());
        return new MediaResource($topic_media);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicMedia::destroy($id);

        return response()->json(['message' => 'Topic media was deleted successfully.']);
    }
}
