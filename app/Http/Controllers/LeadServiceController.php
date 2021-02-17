<?php

namespace App\Http\Controllers;

use App\Models\LeadService;
use Illuminate\Http\Request;

class LeadServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = LeadService::orderBy('id', 'desc')->get();
        return view('backend.lead.service', compact('services'));
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
        $service = new LeadService();
        $service->name = $request->name;
        $service->description = $request->description;
        try {
            $service->save();
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
     * @param  \App\Models\LeadService  $leadService
     * @return \Illuminate\Http\Response
     */
    public function show(LeadService $leadService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeadService  $leadService
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadService $leadService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeadService  $leadService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadService $leadService)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:50',
        ]);
        $leadService->name = $request->name;
        $leadService->description = $request->description;
        try {
            $leadService->save();
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
     * @param  \App\Models\LeadService  $leadService
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadService $leadService)
    {
        try {
            $leadService->delete();
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
