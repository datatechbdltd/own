<?php

namespace App\Http\Controllers;

use App\Models\LeadCategory;
use App\Models\smsCampaign;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SmsCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = smsCampaign::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('action', function($data) {
                    return '<a href="'.route('campaign.smsCampaign.show', $data).'" class="btn btn-primary" target="_blank">SHOW</a>
                            <button class="btn btn-danger edit-btn" onclick="edit('.$data->id.')">EDIT</button>
                            <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('campaign.smsCampaign.destroy', $data).'">DELETE</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }else{
            $categories = LeadCategory::orderBy('id', 'desc')->get();
            return view('backend.lead.sms-campaign', compact('categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('backend.lead.sms-campaign-create');
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
            'category' => 'required|exists:lead_categories,id',
            'message' => 'required|min:5'
        ]);
        $campaign = new smsCampaign();
        $campaign->created_by_id = auth()->user()->id;
        $campaign->category_id = $request->category;
        $campaign->message = $request->message;
        try {
            $campaign->save();
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
     * @param  \App\Models\smsCampaign  $smsCampaign
     * @return \Illuminate\Http\Response
     */
    public function show(smsCampaign $smsCampaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\smsCampaign  $smsCampaign
     * @return \Illuminate\Http\Response
     */
    public function edit(smsCampaign $smsCampaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\smsCampaign  $smsCampaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, smsCampaign $smsCampaign)
    {
        $request->validate([
            'category' => 'required|exists:lead_categories,id',
            'message' => 'required|min:5'
        ]);
        $smsCampaign->created_by_id = auth()->user()->id;
        $smsCampaign->category_id = $request->category;
        $smsCampaign->message = $request->message;
        try {
            $smsCampaign->save();
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
     * @param  \App\Models\smsCampaign  $smsCampaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(smsCampaign $smsCampaign)
    {
        try {
            $smsCampaign->delete();
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
