<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComplaintResource;
use App\TopicCommentComplaint;
use Illuminate\Http\Request;

class TopicCommentComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_comment_complaints = TopicCommentComplaint::paginate(5);
        return ComplaintResource::collection($topic_comment_complaints);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TopicCommentComplaint
     */
    public function store(Request $request)
    {
        $topic_comment_complaint = TopicCommentComplaint::create($request->all());

        return new TopicCommentComplaint($topic_comment_complaint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ComplaintResource
     */
    public function show($id)
    {
        $topic_comment_complaint = TopicCommentComplaint::find($id);
        return new ComplaintResource($topic_comment_complaint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ComplaintResource
     */
    public function update(Request $request, $id)
    {
        $topic_comment_complaint = TopicCommentComplaint::find($id);
        $topic_comment_complaint->update($request->all());

        return new ComplaintResource($topic_comment_complaint);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicCommentComplaint::destroy($id);

        return response()->json(['message' => 'Topic comment complaint was deleted successfully.']);
    }
}
