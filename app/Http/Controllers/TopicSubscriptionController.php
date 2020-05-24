<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicSubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\TopicSubscription;
use Illuminate\Http\Request;

class TopicSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_subscription = TopicSubscription::paginate(5);
        return SubscriptionResource::collection($topic_subscription);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicSubscriptionRequest $request
     * @return SubscriptionResource
     */
    public function store(TopicSubscriptionRequest $request)
    {
        $topic_subscription = TopicSubscription::create($request->all());
        return new SubscriptionResource($topic_subscription);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return SubscriptionResource
     */
    public function show($id)
    {
        $topic_subscription = TopicSubscription::find($id);
        return new SubscriptionResource($topic_subscription);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicSubscriptionRequest $request
     * @param  int  $id
     * @return SubscriptionResource
     */
    public function update(TopicSubscriptionRequest $request, $id)
    {
        $topic_subscription = TopicSubscription::find($id);
        $topic_subscription->update($request->all());
        return new SubscriptionResource($topic_subscription);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicSubscription::destroy($id);

        return response()->json(['message' => 'Topic subscription was deleted successfully.']);
    }
}
