<?php

namespace App\Http\Controllers;

use App\ChannelSubscription;
use App\Http\Requests\ChannelSubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use Illuminate\Http\Request;

class ChannelSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $channel_subscriptions = ChannelSubscription::paginate(5);
        return SubscriptionResource::collection($channel_subscriptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ChannelSubscriptionRequest  $request
     * @return SubscriptionResource
     */
    public function store(ChannelSubscriptionRequest $request)
    {
        $channel_subscription = ChannelSubscription::create($request->all());
        return new SubscriptionResource($channel_subscription);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return SubscriptionResource
     */
    public function show($id)
    {
        $channel_subscription = ChannelSubscription::find($id);
        return new SubscriptionResource($channel_subscription);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChannelSubscriptionRequest  $request
     * @param  int  $id
     * @return SubscriptionResource
     */
    public function update(ChannelSubscriptionRequest $request, $id)
    {
        $channel_subscription = ChannelSubscription::find($id);
        $channel_subscription->update($request->all());

        return new SubscriptionResource($channel_subscription);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        ChannelSubscription::destroy($id);

        return response()->json(['message' => 'Channel subscription was deleted.']);
    }
}
