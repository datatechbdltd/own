<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

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
                })->addColumn('create', function($data) {
                    return $data->created_at->format('d/M/Y');
                })->addColumn('action', function($data) {
                    return '<a href="'.route('account.expense.edit', $data).'" class="btn btn-info"><i class="fa fa-edit"></i> </a>

                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('account.expense.destroy', $data).'"><i class="fa fa-trash"></i> </button>';
                })
                ->rawColumns(['category','create','action'])
                ->make(true);
        }else{
            return view('backend.account.expense-index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expense_categorys = ExpenseCategory::all();
        return view('backend.account.expense-create', compact('expense_categorys'));
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
            'category_id' => 'nullable|exists:expense_categories,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'image' => 'nullable|image',
        ]);

        $expense = new Expense();

        $expense->category_id    =   $request->expense_category;
        $expense->name    =   $request->name;
        $expense->description    =   $request->description;
        $expense->amount    =   $request->amount;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/expense/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $expense->image = $folder_path.$image_new_name;
        }

        $expense->save();
        return back()->withToastSuccess('Successfully saved.');
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
        $expense_categorys = ExpenseCategory::all();
        return view('backend.account.expense-edit', compact('expense_categorys','expense'));
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
        $request->validate([
            'category_id' => 'nullable|exists:expense_categories,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'image' => 'nullable|image',
        ]);

        $expense = $expense;
        $expense->category_id    =   $request->expense_category;
        $expense->name    =   $request->name;
        $expense->description    =   $request->description;
        $expense->amount    =   $request->amount;

        if($request->hasFile('image')){
            if ($expense->image != null)
                File::delete(public_path($expense->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/expense/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $expense->image = $folder_path.$image_new_name;
        }

        $expense->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        try {
            if ($expense->image != null)
                File::delete(public_path($expense->image)); //Old image delete

            $expense->delete();
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
