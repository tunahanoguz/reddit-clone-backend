<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Http\Resources\TopicResource;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topics = Topic::paginate(5);

        return TopicResource::collection($topics);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicRequest  $request
     * @return TopicResource
     */
    public function store(TopicRequest $request)
    {
        $topic = Topic::create($request->all());

        return new TopicResource($topic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TopicResource
     */
    public function show($id)
    {
        $topic = Topic::find($id);

        return new TopicResource($topic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicRequest $request
     * @param  int  $id
     * @return TopicResource
     */
    public function update(TopicRequest $request, $id)
    {
        $topic = Topic::find($id);
        $topic->update($request->all());

        return new TopicResource($topic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Topic::destroy($id);

        return response()->json(['message' => 'Topic was deleted successfully.']);
    }
}
