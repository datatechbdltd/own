<?php

namespace App\Http\Controllers;

use App\Models\CustomPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomPageController extends Controller
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
        return view('backend.website.custom-page.create');
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
            'name'  =>  'required|string|unique:custom_pages',
            'serial'  =>  'required|numeric|unique:custom_pages',
            'title' =>  'required|string|unique:custom_pages',
            'status'    =>  'required|boolean',
            'image' =>  'nullable|image',
            'description'   =>  'required',
        ]);

        $customPage = new CustomPage();
        $customPage->name   =   $request->name;
        $customPage->slug   =   Str::slug($request->name, '-');
        $customPage->title  =   $request->title;
        $customPage->status =   $request->status;
        $customPage->image  =   $request->image;
        $customPage->description    =   $request->description;
        $customPage->serial    =   $request->serial;
        $customPage->save();
        return redirect()->route('website.customPage.edit', $customPage)->withSuccess('Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomPage  $customPage
     * @return \Illuminate\Http\Response
     */
    public function show(CustomPage $customPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomPage  $customPage
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomPage $customPage)
    {
        return view('backend.website.custom-page.edit', compact('customPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomPage  $customPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomPage $customPage)
    {
        $request->validate([
            'name'  =>  'required|string|unique:custom_pages,name,'.$customPage->id,
            'serial'  =>  'required|numeric|unique:custom_pages,serial,'.$customPage->id,
            'title' =>  'required|string|unique:custom_pages,title,'.$customPage->id,
            'status'    =>  'required|boolean',
            'image' =>  'nullable|image',
            'description'   =>  'required',
        ]);
        $customPage->name   =   $request->name;
        $customPage->slug   =   Str::slug($request->name, '-');
        $customPage->title  =   $request->title;
        $customPage->status =   $request->status;
        $customPage->image  =   $request->image;
        $customPage->description    =   $request->description;
        $customPage->serial    =   $request->serial;
        $customPage->save();
        return back()->withSuccess('Success fully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomPage  $customPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomPage $customPage)
    {
        //
    }
}
