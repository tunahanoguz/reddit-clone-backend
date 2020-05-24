<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCommentReplyComplaintRequest;
use App\Http\Resources\ComplaintResource;
use App\TopicCommentReplyComplaint;
use Illuminate\Http\Request;

class TopicCommentReplyComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_reply_complaints = TopicCommentReplyComplaint::paginate(5);
        return ComplaintResource::collection($topic_comment_reply_complaints);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicCommentReplyComplaintRequest $request
     * @return ComplaintResource
     */
    public function store(TopicCommentReplyComplaintRequest $request)
    {
        $topic_comment_reply_complaint = TopicCommentReplyComplaint::create($request->all());
        return new ComplaintResource($topic_comment_reply_complaint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ComplaintResource
     */
    public function show($id)
    {
        $topic_comment_reply_complaint = TopicCommentReplyComplaint::find($id);
        return new ComplaintResource($topic_comment_reply_complaint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicCommentReplyComplaintRequest $request
     * @param  int  $id
     * @return ComplaintResource
     */
    public function update(TopicCommentReplyComplaintRequest $request, $id)
    {
        $topic_comment_reply_complaint = TopicCommentReplyComplaint::find($id);
        $topic_comment_reply_complaint->update($request->all());
        return new ComplaintResource($topic_comment_reply_complaint);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentReplyComplaint::destroy($id);

        return response()->json(['message' => 'Topic comment reply complaint was deleted successfully.']);
    }
}
