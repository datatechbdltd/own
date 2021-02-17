<?php

namespace App\Http\Controllers;

use App\Models\LeadCategory;
use Illuminate\Http\Request;

class LeadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = LeadCategory::orderBy('id', 'desc')->get();
        return view('backend.lead.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:50'
        ]);
        $category = new LeadCategory();
        $category->name = $request->name;
        $category->description = $request->description;
        try {
            $category->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully saved.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong. '.$exception->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeadCategory  $leadCategory
     * @return \Illuminate\Http\Response
     */
    public function show(LeadCategory $leadCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeadCategory  $leadCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadCategory $leadCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeadCategory  $leadCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadCategory $leadCategory)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:50',
        ]);
        $leadCategory->name = $request->name;
        $leadCategory->description = $request->description;
        try {
            $leadCategory->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully updated.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong. '.$exception->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeadCategory  $leadCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadCategory $leadCategory)
    {
        try {
            $leadCategory->delete();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully deleted.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong. '.$exception->getMessage(),
            ]);
        }
    }
}
