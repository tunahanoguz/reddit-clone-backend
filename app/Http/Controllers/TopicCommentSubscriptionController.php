<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentSubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\TopicCommentSubscription;
use Illuminate\Http\Request;

class TopicCommentSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_subscriptions = TopicCommentSubscription::paginate(5);
        return SubscriptionResource::collection($topic_comment_subscriptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicCommentSubscriptionRequest $request
     * @return SubscriptionResource
     */
    public function store(TopicCommentSubscriptionRequest $request)
    {
        $topic_comment_subscription = TopicCommentSubscription::create($request->all());
        return new SubscriptionResource($topic_comment_subscription);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return SubscriptionResource
     */
    public function show($id)
    {
        $topic_comment_subscription = TopicCommentSubscription::find($id);
        return new SubscriptionResource($topic_comment_subscription);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicCommentSubscriptionRequest $request
     * @param  int  $id
     * @return SubscriptionResource
     */
    public function update(TopicCommentSubscriptionRequest $request, $id)
    {
        $topic_comment_subscription = TopicCommentSubscription::find($id);
        $topic_comment_subscription->update($request->all());
        return new SubscriptionResource($topic_comment_subscription);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentSubscription::destroy($id);

        return response()->json(['message' => 'Topic comment subscription was deleted successfully.']);
    }
}
