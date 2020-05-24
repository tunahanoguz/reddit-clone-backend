<?php

namespace App\Http\Controllers;

use App\ComplaintCategory;
use App\Http\Resources\ComplaintCategoryResource;
use Illuminate\Http\Request;

class ComplaintCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $complaint_category = ComplaintCategory::paginate(5);
        return ComplaintCategoryResource::collection($complaint_category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ComplaintCategoryResource
     */
    public function store(Request $request)
    {
        $complaint_category = ComplaintCategory::create($request->all());
        return new ComplaintCategoryResource($complaint_category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ComplaintCategoryResource
     */
    public function show($id)
    {
        $complaint_category = ComplaintCategory::find($id);
        return new ComplaintCategoryResource($complaint_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ComplaintCategoryResource
     */
    public function update(Request $request, $id)
    {
        $complaint_category = ComplaintCategory::find($id);
        return new ComplaintCategoryResource($complaint_category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        ComplaintCategory::destroy($id);

        return response()->json(['message' => 'Complaint category was deleted successfully.']);
    }
}
