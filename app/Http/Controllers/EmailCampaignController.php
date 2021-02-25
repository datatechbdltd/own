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
                // ->addColumn('category', function($data) {
                //     return $data->leadCategory->name ?? '-';
                // })
                ->addColumn('category', function($data) {
                    $text =  $data->leadCategory->name ?? '-';
                    if ($data->leadCategory)  if ($data->leadCategory) // error remover, if category is not exists
                    $text .=  '<b class="text-danger"> ('.$data->leadCategory->emailLeads->count().')</b>' ?? '-';
                    return $text;
                })
                ->addColumn('auto_run_at', function($data) {
                    return $data->auto_run_at ?? '-';
                }) ->addColumn('action', function($data) {
                    return '<a href="'.route('campaign.runEmailCampaign', $data).'" class="btn btn-success">SEND</a>
                            <a href="'.route('campaign.emailCampaign.edit', $data).'" class="btn btn-warning">EDIT</a>
                            <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('campaign.emailCampaign.destroy', $data).'">DELETE</button>';
                })
                ->rawColumns(['action', 'category', 'auto_run_at'])
                ->make(true);
        }else{
            return view('backend.lead.email-campaign');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = LeadCategory::orderBy('id', 'desc')->get();
        return view('backend.lead.email-campaign-create', compact( 'categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|exists:lead_categories,id',
            'message' => 'required|min:5',
            'is_auto_run' => 'nullable|boolean'
        ]);
        $campaign = new emailCampaign();
        $campaign->created_by_id = auth()->user()->id;
        $campaign->category_id = $request->category;
        $campaign->message = $request->message;
        $campaign->attachment = $request->attachment;
        if ($request->is_auto_run){
            $campaign->auto_run_at = $request->auto_run_at;
        }else{
            $campaign->auto_run_at = null;
        }
        try {
            $campaign->save();
            return redirect()->route('campaign.emailCampaign.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
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
        $categories = LeadCategory::orderBy('id', 'desc')->get();
        return view('backend.lead.email-campaign-edit', compact('emailCampaign', 'categories'));
    }

    /**
     * @param Request $request
     * @param emailCampaign $emailCampaign
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, emailCampaign $emailCampaign)
    {
        $request->validate([
            'category' => 'required|exists:lead_categories,id',
            'message' => 'required|min:5',
            'is_auto_run' => 'nullable|boolean'
        ]);
        $emailCampaign->category_id = $request->category;
        $emailCampaign->message = $request->message;
        $emailCampaign->attachment = $request->attachment;
        if ($request->is_auto_run){
            $emailCampaign->auto_run_at = $request->auto_run_at;
        }else{
            $emailCampaign->auto_run_at = null;
        }
        try {
            $emailCampaign->save();
            return back()->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
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

    public function runEmailCampaign($email_campaign_id){
        return back()->withSuccess(send_email_from_campaign(emailCampaign::find($email_campaign_id)));
    }
}
