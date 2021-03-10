<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Asset::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('category', function($data) {
                    return $data->category->name ?? '-';
                })->addColumn('create', function($data) {
                    return $data->created_at->format('d/M/Y');
                })->addColumn('action', function($data) {
                    return '<a href="'.route('account.asset.edit', $data).'" class="btn btn-info"><i class="fa fa-edit"></i> </a>

                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('account.asset.destroy', $data).'"><i class="fa fa-trash"></i> </button>';
                })
                ->rawColumns(['category','create','action'])
                ->make(true);
        }else{
            return view('backend.asset.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset_categories = AssetCategory::all();
        return view('backend.asset.create', compact('asset_categories'));
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
            'asset_category' => 'required|exists:asset_categories,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'nullable|string',
            'quantity' => 'nullable|string',
            'purchase_date' => 'nullable|string',
        ]);

        $asset = new Asset();

        $asset->category_id    =   $request->asset_category;
        $asset->name    =   $request->name;
        $asset->description    =   $request->description;
        $asset->price    =   $request->price;
        $asset->quantity    =   $request->quantity;
        $asset->purchase_date    =   $request->purchase_date;

        $asset->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        $asset_categories = AssetCategory::all();
        return view('backend.asset.edit', compact('asset_categories','asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'asset_category' => 'required|exists:asset_categories,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'nullable|string',
            'quantity' => 'nullable|string',
            'purchase_date' => 'nullable|string',
        ]);

        $asset = $asset;

        $asset->category_id    =   $request->asset_category;
        $asset->name    =   $request->name;
        $asset->description    =   $request->description;
        $asset->price    =   $request->price;
        $asset->quantity    =   $request->quantity;
        $asset->purchase_date    =   $request->purchase_date;

        $asset->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        try {
            $asset->delete();
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
