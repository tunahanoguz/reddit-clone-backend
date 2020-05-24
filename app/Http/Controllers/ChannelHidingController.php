<?php

namespace App\Http\Controllers;

use App\ChannelHiding;
use App\Http\Requests\ChannelHidingRequest;
use App\Http\Resources\HidingResource;
use Illuminate\Http\Request;

class ChannelHidingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $channel_hidings = ChannelHiding::paginate(5);
        return HidingResource::collection($channel_hidings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ChannelHidingRequest $request
     * @return HidingResource
     */
    public function store(ChannelHidingRequest $request)
    {
        $channel_hiding = ChannelHiding::create($request->all());
        return new HidingResource($channel_hiding);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ChannelHiding
     */
    public function show($id)
    {
        $channel_hiding = ChannelHiding::find($id);
        return new ChannelHiding($channel_hiding);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return HidingResource
     */
    public function update(Request $request, $id)
    {
        $channel_hiding = ChannelHiding::find($id);
        $channel_hiding->update($request->all());

        return new HidingResource($channel_hiding);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        ChannelHiding::destroy($id);
        return response()->json(['message' => 'Channel hiding was created.']);
    }
}
