<?php

namespace App\Http\Controllers;

use App\Models\CompanyPad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CompanyPadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = CompanyPad::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('create', function($data) {
                    return $data->created_at->format('d/M/Y');
                })->addColumn('action', function($data) {
                    return '<a href="'.route('companyPad.edit', $data).'" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                    <a target="_blank" href="'.route('pdf.companyPadStream', $data->slug).'" class="btn btn-success"><i class="feather icon-printer"></i> </a>
                    <a target="_blank" href="'.route('pdf.companyPadDownload', $data->slug).'" class="btn btn-primary"><i class="feather icon-download"></i> </a>
                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('companyPad.destroy', $data).'"><i class="fa fa-trash"></i> </button>';
                })
                ->rawColumns(['create', 'action'])
                ->make(true);
        }else{
            return view('backend.company-pad.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.company-pad.create');
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
            'title' => 'required',
            'description' => 'nullable',
            'date' => 'required',
        ]);

        $company_pad = new CompanyPad();

        $company_pad->title    =   $request->title;
        $company_pad->description    =   $request->description;
        $company_pad->date    =   $request->date;
        $company_pad->creator_id    =   Auth::user()->id;
        $company_pad->slug    =   time().'-'.Str::random(12);


        $company_pad->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyPad  $companyPad
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyPad $companyPad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyPad  $companyPad
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyPad $companyPad)
    {
        return view('backend.company-pad.edit', compact('companyPad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyPad  $companyPad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyPad $companyPad)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'date' => 'required',
        ]);

        $company_pad = $companyPad;

        $company_pad->title    =   $request->title;
        $company_pad->description    =   $request->description;
        $company_pad->date    =   $request->date;

        $company_pad->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyPad  $companyPad
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyPad $companyPad)
    {
        try {
            $companyPad->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}
