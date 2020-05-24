<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicComplaintRequest;
use App\Http\Resources\ComplaintResource;
use App\TopicComplaint;
use Illuminate\Http\Request;

class TopicComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $topic_complaints = TopicComplaint::paginate(5);
        return ComplaintResource::collection($topic_complaints);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TopicComplaintRequest $request
     * @return ComplaintResource
     */
    public function store(TopicComplaintRequest $request)
    {
        $topic_complaint = TopicComplaint::create($request->all());
        return new ComplaintResource($topic_complaint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ComplaintResource
     */
    public function show($id)
    {
        $topic_complaint = TopicComplaint::find($id);
        return new ComplaintResource($topic_complaint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopicComplaintRequest $request
     * @param  int  $id
     * @return ComplaintResource
     */
    public function update(TopicComplaintRequest $request, $id)
    {
        $topic_complaint = TopicComplaint::find($id);
        return new ComplaintResource($topic_complaint);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        TopicComplaint::destroy($id);

        return response()->json(['message' => 'Topic complaint was deleted successfully.']);
    }
}
