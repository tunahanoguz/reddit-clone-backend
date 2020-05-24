<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicHidingRequest;
use App\Http\Resources\HidingResource;
use App\TopicHiding;
use Illuminate\Http\Request;

class TopicHidingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_hidings = TopicHiding::paginate(5);
        return HidingResource::collection($topic_hidings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicHidingRequest $request
     * @return HidingResource
     */
    public function store(TopicHidingRequest $request)
    {
        $topic_hiding = TopicHiding::create($request->all());
        return new HidingResource($topic_hiding);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return HidingResource
     */
    public function show($id)
    {
        $topic_hiding = TopicHiding::find($id);
        return new HidingResource($topic_hiding);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicHidingRequest $request
     * @param  int  $id
     * @return HidingResource
     */
    public function update(TopicHidingRequest $request, $id)
    {
        $topic_hiding = TopicHiding::find($id);
        $topic_hiding->update($request->all());
        return new HidingResource($topic_hiding);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicHiding::destroy($id);

        return response()->json(['message' => 'Topic hiding was created successfully.']);
    }
}
