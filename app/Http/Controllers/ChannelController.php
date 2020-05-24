<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\ChannelRequest;
use App\Http\Resources\ChannelResource;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $channels = Channel::all();
        return ChannelResource::collection($channels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ChannelResource
     */
    public function store(ChannelRequest $request)
    {
        $channel = Channel::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        $moderators = $request->get('moderator_ids');
        foreach ($moderators as $moderator) {
            $channel->moderators()->sync($moderator);
        }

        return new ChannelResource($channel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ChannelResource
     */
    public function show($id)
    {
        $channel = Channel::find($id);
        return new ChannelResource($channel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ChannelResource
     */
    public function update(Request $request, $id)
    {
        $channel = Channel::find($id);
        $channel->update($request->all());
        return new ChannelResource($channel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Channel::destroy($id);
        return response()->json(['message' => 'Channel was deleted successfully.']);
    }
}
