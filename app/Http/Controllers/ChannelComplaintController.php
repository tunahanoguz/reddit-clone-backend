<?php

namespace App\Http\Controllers;

use App\ChannelComplaint;
use App\Http\Requests\ChannelComplaintRequest;
use App\Http\Resources\ComplaintResource;
use Illuminate\Http\Request;

class ChannelComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $channel_complaints = ChannelComplaint::paginate(5);
        return ComplaintResource::collection($channel_complaints);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ChannelComplaintRequest  $request
     * @return ComplaintResource
     */
    public function store(ChannelComplaintRequest $request)
    {
        $channel_complaint = ChannelComplaint::create($request->all());
        return new ComplaintResource($channel_complaint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ComplaintResource
     */
    public function show($id)
    {
        $channel_complaint = ChannelComplaint::find($id);
        return new ComplaintResource($channel_complaint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChannelComplaintRequest  $request
     * @param  int  $id
     * @return ComplaintResource
     */
    public function update(ChannelComplaintRequest $request, $id)
    {
        $channel_complaint = ChannelComplaint::find($id);
        $channel_complaint->update($request->all());

        return new ComplaintResource($channel_complaint);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        ChannelComplaint::destroy($id);

        return response()->json(['message' => 'Channel complaint was created.']);
    }
}
