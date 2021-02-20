<?php

namespace App\Http\Controllers;

use App\Models\emailCampaign;
use App\Models\LeadCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmailCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = emailCampaign::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('category', function($data) {
                    return $data->leadCategory->name ?? '-';
                }) ->addColumn('action', function($data) {
                    return '<a href="'.route('campaign.emailCampaign.show', $data).'" class="btn btn-primary" target="_blank">SHOW</a>
                            <a href="'.route('campaign.emailCampaign', $data).'" class="btn btn-success">SEND</a>
                            <button class="btn btn-warning" onclick="edit('.$data->id.')">EDIT</button>
                            <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('campaign.emailCampaign.destroy', $data).'">DELETE</button>';
                })
                ->rawColumns(['action', 'category'])
                ->make(true);
        }else{
            $categories = LeadCategory::orderBy('id', 'desc')->get();
            return view('backend.lead.email-campaign', compact('categories'));
        }
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
            'category' => 'required|exists:lead_categories,id',
            'message' => 'required|min:5'
        ]);
        $campaign = new emailCampaign();
        $campaign->created_by_id = auth()->user()->id;
        $campaign->category_id = $request->category;
        $campaign->message = $request->message;
        $campaign->attachment = $request->attachment;
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
     * @param  \App\Models\emailCampaign  $emailCampaign
     * @return \Illuminate\Http\Response
     */
    public function show(emailCampaign $emailCampaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\emailCampaign  $emailCampaign
     * @return \Illuminate\Http\Response
     */
    public function edit(emailCampaign $emailCampaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\emailCampaign  $emailCampaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, emailCampaign $emailCampaign)
    {
        $request->validate([
            'category' => 'required|exists:lead_categories,id',
            'message' => 'required|min:5'
        ]);
        $emailCampaign->created_by_id = auth()->user()->id;
        $emailCampaign->category_id = $request->category;
        $emailCampaign->message = $request->message;
        $emailCampaign->attachment = $request->attachment;
        try {
            $emailCampaign->save();
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
     * @param  \App\Models\emailCampaign  $emailCampaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(emailCampaign $emailCampaign)
    {
        try {
            $emailCampaign->delete();
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

    public function runSmsCampaign($email_campaign_id){
        return back()->withSuccess(send_email_from_campaign(emailCampaign::find($email_campaign_id)));
    }
}
