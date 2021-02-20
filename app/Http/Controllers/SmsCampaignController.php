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
                ->addColumn('category', function($data) {
                    return $data->leadCategory->name ?? '-';
                })
                ->addColumn('auto_run_at', function($data) {
                    return $data->auto_run_at ?? '-';
                }) ->addColumn('action', function($data) {
                    return '<a href="'.route('campaign.smsCampaign.show', $data).'" class="btn btn-primary mce-btn-small" target="_blank">SHOW</a>
                            <a href="'.route('campaign.runSmsCampaign', $data).'" class="btn btn-success mce-btn-small">SEND</a>
                            <a href="'.route('campaign.smsCampaign.edit', $data).'" class="btn btn-warning mce-btn-small">EDIT</a>
                            <button class="btn btn-danger mce-btn-small" onclick="delete_function(this)" value="'.route('campaign.smsCampaign.destroy', $data).'">DELETE</button>';
                })
                ->rawColumns(['action', 'category', 'auto_run_at'])
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
            'message' => 'required|min:5',
            'is_auto_run' => 'nullable|boolean'
        ]);
        $campaign = new smsCampaign();
        $campaign->created_by_id = auth()->user()->id;
        $campaign->category_id = $request->category;
        $campaign->message = $request->message;
         if ($request->is_auto_run){
            $campaign->auto_run_at = $request->auto_run_at;
        }else{
            $campaign->auto_run_at = null;
        }
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
        $categories = LeadCategory::orderBy('id', 'desc')->get();
        return view('backend.lead.sms-campaign-edit', compact('smsCampaign', 'categories'));
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
            'message' => 'required|min:5',
            'is_auto_run' => 'nullable|boolean'
        ]);
        $smsCampaign->category_id = $request->category;
        $smsCampaign->message = $request->message;
         if ($request->is_auto_run){
             $smsCampaign->auto_run_at = $request->auto_run_at;
        }else{
             $smsCampaign->auto_run_at = null;
        }
        try {
            $smsCampaign->save();
            return back()->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
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

    public function runSmsCampaign($sms_campaign_id){
        return back()->withSuccess(send_sms_from_campaign(smsCampaign::find($sms_campaign_id)));
    }
}
