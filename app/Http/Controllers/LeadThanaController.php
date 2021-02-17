<?php

namespace App\Http\Controllers;

use App\Models\LeadThana;
use Illuminate\Http\Request;

class LeadThanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thanas = LeadThana::orderBy('id', 'desc')->get();
        return view('backend.lead.thana', compact('thanas'));
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
        $thana = new LeadThana();
        $thana->name = $request->name;
        $thana->description = $request->description;
        try {
            $thana->save();
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
     * @param  \App\Models\LeadThana  $leadThana
     * @return \Illuminate\Http\Response
     */
    public function show(LeadThana $leadThana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeadThana  $leadThana
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadThana $leadThana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeadThana  $leadThana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadThana $leadThana)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:50',
        ]);
        $leadThana->name = $request->name;
        $leadThana->description = $request->description;
        try {
            $leadThana->save();
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
     * @param  \App\Models\LeadThana  $leadThana
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadThana $leadThana)
    {
        try {
            $leadThana->delete();
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
