<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\OfflinePaymentMethod;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Payment::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('invoice', function($data) {
                    if($data->invoice)
                        return $data->invoice->invoice_id;
                })->addColumn('offline_method', function($data) {
                    if($data->offlinePaymentMethod)
                        return $data->offlinePaymentMethod->name;
                })->addColumn('amount', function($data) {
                    return $data->amount;
                })->addColumn('action', function($data) {
                    return '<a href="'.route('sales.payment.edit', $data).'" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('sales.payment.destroy', $data).'"><i class="fa fa-trash"></i> </button>';
                })
                ->rawColumns(['invoice','offline_method', 'amount','action'])
                ->make(true);
        }else{
            return view('backend.sales.payment-index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoices = Invoice::all();
        $offline_payment_methods = OfflinePaymentMethod::all();
        return view('backend.sales.payment-create', compact('invoices', 'offline_payment_methods'));
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
            'offline_payment_method' => 'nullable|exists:offline_payment_methods,id',
            'invoice' => 'required|exists:invoices,id',
            'amount' => 'required|numeric',
        ]);

        $payment = new Payment();
        $payment->payment_offline_method_id    =   $request->offline_payment_method;
        $payment->invoice_id    =   $request->invoice;
        $payment->amount    =   $request->amount;
        $payment->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $invoices = Invoice::all();
        $offline_payment_methods = OfflinePaymentMethod::all();
        return view('backend.sales.payment-edit', compact('invoices', 'offline_payment_methods','payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'offline_payment_method' => 'nullable|exists:offline_payment_methods,id',
            'invoice' => 'required|exists:invoices,id',
            'amount' => 'required|numeric',
        ]);

        $payment = $payment;
        $payment->payment_offline_method_id    =   $request->offline_payment_method;
        $payment->invoice_id    =   $request->invoice;
        $payment->amount    =   $request->amount;
        $payment->save();
        return back()->withToastSuccess('Successfully saved.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        try {
            $payment->delete();
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
