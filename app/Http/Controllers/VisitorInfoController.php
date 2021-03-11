<?php

namespace App\Http\Controllers;

use App\Models\VisitorInfo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VisitorInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$data = VisitorInfo::all();
        //echo($data);
        if ($request->ajax()){

            return datatables::of($data)
                ->addColumn('url', function($data) {
                    return '
                    <a target="_blank" class="small" href="'.$data->url.'">'.$data->url.' </a>';
                })
                ->addColumn('create', function($data) {
                    return $data->created_at->format('d/M/Y');
                })
                ->rawColumns(['create','url'])
                ->make(true);
        }else{
            return view('backend.visitor.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisitorInfo  $visitorInfo
     * @return \Illuminate\Http\Response
     */
    public function show(VisitorInfo $visitorInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisitorInfo  $visitorInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitorInfo $visitorInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisitorInfo  $visitorInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitorInfo $visitorInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitorInfo  $visitorInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitorInfo $visitorInfo)
    {
        //
    }
}
