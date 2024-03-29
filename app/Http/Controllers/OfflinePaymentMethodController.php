<?php

namespace App\Http\Controllers;

use App\Models\OfflinePaymentMethod;
use Illuminate\Http\Request;

class OfflinePaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $offline_payment = new OfflinePaymentMethod();

        $offline_payment->name    =   $request->name;
        $offline_payment->description    =  $request->description;
        $offline_payment->save();
        return back()->withToastSuccess('Successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfflinePaymentMethod  $offlinePaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(OfflinePaymentMethod $offlinePaymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfflinePaymentMethod  $offlinePaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(OfflinePaymentMethod $offlinePaymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfflinePaymentMethod  $offlinePaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfflinePaymentMethod $offlinePaymentMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfflinePaymentMethod  $offlinePaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfflinePaymentMethod $offlinePaymentMethod)
    {
        try {
            $offlinePaymentMethod->delete();
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
