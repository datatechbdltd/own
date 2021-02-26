<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\OfflinePaymentMethod;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Income::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('payment', function($data) {
                    return 'Price: '.$data->price.' Paid: '.$data->payments->sum('amount').' Due: '.($data->price - $data->payments->sum('amount'));
                }) ->addColumn('customer', function($data) {
                    if ($data->customer)
                    return $data->customer->name;
                }) ->addColumn('service_product', function($data) {
                    $html = "";
                    if ($data->service)
                        $html .= $data->service->name;
                    if ($data->product)
                        $html .= $data->product->name;
                    return $html;
                })->addColumn('create', function($data) {
                    return $data->created_at->format('d/M/Y');
                })->addColumn('create', function($data) {
                    return 'Action';
                })
                ->rawColumns(['payment','customer', 'service_product', 'create', 'action'])
                ->make(true);
        }else{
            $customers = User::role('customer')->get();
            $products = Product::all();
            $services = Service::all();
            $offlinePaymentMethods = OfflinePaymentMethod::all();
            return view('backend.account.income', compact('customers', 'products','services', 'offlinePaymentMethods'));
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
        $request->validate([
            'customer' => 'nullable|exists:users,id',
            'service' => 'nullable|exists:services,id',
            'product' => 'nullable|exists:products,id',
            'description' => 'required',
            'price' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'payment_method' => 'nullable|exists:offline_payment_methods,id',
            'vat' => 'nullable|numeric',
        ]);
        $income = new Income();
        $income->category_id    =   $request->category;
        $income->customer_id    =   $request->customer;
        $income->price  =   $request->price;
        $income->description    =   $request->description;
        $income->product_id =   $request->product;
        $income->service_id =   $request->service;
        $income->vat    =   $request->vat;
        $income->save();

        $payment = new Payment();
        $payment->amount = $request->paid_amount;
        $payment->payment_offline_method_id = $request->payment_method;
        $payment->income_id = $income->id;
        $payment->save();

        return back()->withToastSuccess('Successfully saved.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
