<?php

namespace App\Http\Controllers;

use App\Models\NonMaskingSmsOrder;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class NonMaskingSmsOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = NonMaskingSmsOrder::orderBy('id', 'desc')->get();
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
            return view('backend.non-masking-sms.index');
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NonMaskingSmsOrder  $nonMaskingSmsOrder
     * @return \Illuminate\Http\Response
     */
    public function show(NonMaskingSmsOrder $nonMaskingSmsOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NonMaskingSmsOrder  $nonMaskingSmsOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(NonMaskingSmsOrder $nonMaskingSmsOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NonMaskingSmsOrder  $nonMaskingSmsOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NonMaskingSmsOrder $nonMaskingSmsOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NonMaskingSmsOrder  $nonMaskingSmsOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(NonMaskingSmsOrder $nonMaskingSmsOrder)
    {
        //
    }
}
