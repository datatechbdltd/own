<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use App\Models\WebsiteProduct;
use App\Models\WebsiteService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Proposal::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('customer', function($data) {
                    if ($data->customer)
                    return $data->customer->name;
                })->addColumn('create', function($data) {
                    return $data->created_at->format('d/M/Y');
                })->addColumn('action', function($data) {
                    return '<a href="'.route('pdf.proposalStream', $data->slug).'" class="btn btn-primary" target="_blank">Stream</a>
                    <a href="'.route('sales.proposal.edit', $data).'" class="btn btn-info" target="_blank"><i class="fa fa-edit"></i> </a>
                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('sales.proposal.destroy', $data).'"><i class="fa fa-trash"></i> </button>
                    <button class="btn btn-info" onclick="copy_function(this)" value="'.route('frontend.prposalPage', $data->slug).'"><i class="fa fa-copy"></i> </button>
                    <a href="'.route('frontend.prposalPage', $data->slug).'" class="btn btn-success" target="_blank"><i class="fa fa-eye"></i> </a>';
                })
                ->rawColumns(['customer', 'service_product', 'create', 'action'])
                ->make(true);
        }else{
            return view('backend.sales.proposal-index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = User::role('customer')->get();
        $products = WebsiteProduct::all();
        $services = WebsiteService::all();
        return view('backend.sales.proposal-create', compact('customers', 'products','services'));
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
            // 'customer' => 'nullable|exists:users,id',
            // 'service' => 'nullable|exists:services,id',
            // 'product' => 'nullable|exists:products,id',
            'description' => 'required',
            'guest_email' => 'nullable',
            'guest_phone' => 'nullable',
            'budget' => 'required|numeric',
        ]);

        // dd($request);
        $proposal = new Proposal();
        $proposal->product_id =   $request->product;
        $proposal->service_id =   $request->service;
        $proposal->customer_id    =   $request->customer;
        $proposal->description    =   $request->description;
        $proposal->guest_email    =   $request->guest_email;
        $proposal->guest_phone    =   $request->guest_phone;
        $proposal->budget    =   $request->budget;
        $proposal->slug    =   time().'-'.Str::random(12);
        $proposal->save();
        return back()->withToastSuccess('Successfully saved.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        $customers = User::role('customer')->get();
        $products = Product::all();
        $services = Service::all();
        return view('backend.sales.proposal-edit', compact('customers', 'products','services', 'proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        $request->validate([
            // 'customer' => 'nullable|exists:users,id',
            // 'service' => 'nullable|exists:services,id',
            // 'product' => 'nullable|exists:products,id',
            'description' => 'required',
            'guest_email' => 'nullable',
            'guest_phone' => 'nullable',
            'budget' => 'required|numeric',
        ]);
        $proposal = $proposal;
        $proposal->product_id =   $request->product;
        $proposal->service_id =   $request->service;
        $proposal->customer_id    =   $request->customer;
        $proposal->description    =   $request->description;
        $proposal->guest_email    =   $request->guest_email;
        $proposal->guest_phone    =   $request->guest_phone;
        $proposal->budget    =   $request->budget;
        $proposal->save();
        return back()->withToastSuccess('Successfully saved.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        try {
            $proposal->delete();
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
}
