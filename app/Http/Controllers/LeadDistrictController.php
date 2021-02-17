<?php

namespace App\Http\Controllers;

use App\Models\LeadDistrict;
use Illuminate\Http\Request;

class LeadDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = LeadDistrict::orderBy('id', 'desc')->get();
        return view('backend.lead.district', compact('districts'));
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
        $district = new LeadDistrict();
        $district->name = $request->name;
        $district->description = $request->description;
        try {
            $district->save();
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
     * @param  \App\Models\LeadDistrict  $leadDistrict
     * @return \Illuminate\Http\Response
     */
    public function show(LeadDistrict $leadDistrict)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeadDistrict  $leadDistrict
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadDistrict $leadDistrict)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeadDistrict  $leadDistrict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadDistrict $leadDistrict)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:50',
        ]);
        $leadDistrict->name = $request->name;
        $leadDistrict->description = $request->description;
        try {
            $leadDistrict->save();
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
     * @param  \App\Models\LeadDistrict  $leadDistrict
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadDistrict $leadDistrict)
    {
        try {
            $leadDistrict->delete();
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
