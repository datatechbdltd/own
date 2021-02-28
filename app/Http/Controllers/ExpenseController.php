<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Expense::orderBy('id', 'desc')->get();
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
                            <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('lead.lead.destroy', $data).'">DELETE</button>';
                })
                ->rawColumns(['All','action', 'category'])
                ->make(true);
        }else{
            return view('backend.account.income');
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
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
