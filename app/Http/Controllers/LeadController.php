<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LeadController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Lead::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('category', function($data) {
                    return $data->category->name ?? '-';
                })
                ->addColumn('All', function($data) {
                    $html = '<input type="checkbox" class="filled-in chk-col-danger demo-checkbox" name="check" id="id-'.$data->id.'" value="'.$data->id.'"><label class="badge badge-pill badge-success shadow-warning m-1" for="id-'.$data->id.'">Select #'. $data->id.'</lecel>';
                    return $html;
                })
                ->addColumn('action', function($data) {
                    return '<a href="'.route('lead.lead.show', $data).'" class="btn btn-primary" target="_blank">SHOW</a>
                           <button class="btn btn-info" onclick="change_category(this)" value="'.$data->id.'">Category</button>
                            <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('lead.lead.destroy', $data).'">DELETE</button>';
                })
                ->rawColumns(['All','action', 'category'])
                ->make(true);
        }else{
            return view('backend.lead.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = LeadCategory::all();
        return view('backend.lead.lead-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        try {
            $lead->delete();
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

    public function category(Request $request){
        if(!$request->ajax()){
            return view('errors.404')->withErrors('Wrong access.');
        }else{
            $categories = LeadCategory::all();
            $lead = Lead::find($request->lead);
            $items = array();
            foreach($categories as $category) {
                if($lead->category_id ==  $category->id){
                    $items[] = '<option class="bg-success" selected value="'.$category->id.'">'.$category->name.'</option>';
                }else{
                    $items[] = '<option value="'.$category->id.'">'.$category->name.'</option>';
                }
            }
            return response()->json([
                'categories' => $items
            ]);
        }
    }

    public function categoryChange(Request $request){
        if(!$request->ajax()){
            return view('errors.404')->withErrors('Wrong access.');
        }else{
           $request->validate([
              'category' => 'required|exists:lead_categories,id',
              'lead' => 'required|exists:leads,id'
           ]);
           $lead =Lead::find($request->lead);
           $lead->category_id = $request->category;
            try
            {
                $lead->save();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully updated'
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something going wrong. '.$exception->getMessage()
                ]);
            }

        }
    }

    public function getByCategory(Request $request, $lead_category_id){
        if ($request->ajax()){
//            $data = Lead::orderBy('id', 'desc')->get();
            $data = LeadCategory::find($lead_category_id)->leads;
            return DataTables::of($data)
                ->addColumn('All', function($data) {
                    $html = '<input type="checkbox" class="filled-in chk-col-danger demo-checkbox" name="check" id="id-'.$data->id.'" value="'.$data->id.'"><label class="badge badge-pill badge-success shadow-warning m-1" for="id-'.$data->id.'">Select #'. $data->id.'</lecel>';
                    return $html;
                })
                ->addColumn('category', function($data) {
                    return $data->category->name ?? '-';
                })
                ->addColumn('action', function($data) {
                    return '<a href="'.route('lead.lead.show', $data).'" class="btn btn-primary" target="_blank">SHOW</a>
                           <button class="btn btn-info" onclick="change_category(this)" value="'.$data->id.'">Category</button>
                            <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('lead.lead.destroy', $data).'">DELETE</button>';
                })
                ->rawColumns(['All', 'action', 'category'])
                ->make(true);
        }else{
            return view('backend.lead.index', compact('lead_category_id'));
        }


    }

    // lead Category Update
    public function leadCategoryUpdate(Request $request){
        if (!$request->input(['leads'])){
            return response()->json(['message'=>'Please select Lead.', 'type'=>'warning']);
        }
        $is_lead_any_one =null;
        foreach($request->input(['leads']) as $item){
            //Database
            $lead = Lead::find($item);
            if ($lead){
                $lead->category_id = $request->category_id;
                $lead->save();
                $is_lead_any_one = 'Yes';
            }else{
                continue;
            }
        }
        if ($is_lead_any_one != null)
            return response()->json(['message'=>'Successfully updated.', 'type'=>'success']);
        else
            return response()->json(['message'=>'Please select Lead.', 'type'=>'warning']);
    }
}
