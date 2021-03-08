<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Invoice::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('customer', function($data) {
                    if ($data->customer)
                    return $data->customer->name;
                })->addColumn('create', function($data) {
                    return $data->created_at->format('d/M/Y');
                })->addColumn('action', function($data) {
                    return '<a href="'.route('pdf.proposalStream', $data).'" class="btn btn-primary" target="_blank">Stream</a>
                    <a href="'.route('sales.proposal.edit', $data).'" class="btn btn-info" target="_blank"><i class="fa fa-edit"></i> </a>
                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('sales.proposal.destroy', $data).'"><i class="fa fa-trash"></i> </button>
                    <button class="btn btn-info" onclick="copy_function(this)" value="'.route('frontend.prposalPage', $data->slug).'"><i class="fa fa-copy"></i> </button>
                    <a href="'.route('frontend.prposalPage', $data->slug).'" class="btn btn-success" target="_blank"><i class="fa fa-eye"></i> </a>';
                })
                ->rawColumns(['customer', 'service_product', 'create', 'action'])
                ->make(true);
        }else{
            return view('backend.sales.invoice-index');
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
        $products = Product::all();
        $services = Service::all();
        return view('backend.sales.invoice-create', compact('customers', 'products','services'));
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
            'description' => 'nullable',
            'product_note' => 'nullable',
            'service_note' => 'nullable',

            'vat' => 'nullable',
            'product_vat' => 'nullable',
            'service_vat' => 'nullable',

            'price' => 'nullable|numeric',
            'product_price' => 'nullable|numeric',
            'service_price' => 'nullable|numeric',
        ]);

        $invoice = new Invoice();

        $invoice->customer_id    =   $request->customer;
        $invoice->service_id    =   $request->service;
        $invoice->product_id    =   $request->product;

        $invoice->other_note    =   $request->description;
        $invoice->product_note    =   $request->product_note;
        $invoice->service_note    =   $request->service_note;

        $invoice->other_vat    =   $request->vat;
        $invoice->service_vat    =   $request->service_vat;
        $invoice->product_vat    =   $request->product_vat;

        $invoice->other_price    =   $request->other_price;
        $invoice->product_price    =   $request->product_price;
        $invoice->service_price    =   $request->service_price;

        do {
            $invoice_id = mt_rand( 000001, 999999);
        } while ( Invoice::where( 'invoice_id', $invoice_id )->exists() );

        $invoice->invoice_id    =   $invoice_id;
        $invoice->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
