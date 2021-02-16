<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSeo;
use Illuminate\Http\Request;

class WebsiteSeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website_seos = WebsiteSeo::orderBy('id', 'desc')->get();
        return view('backend.website.seo.index', compact('website_seos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.seo.create');
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
     * @param  \App\Models\WebsiteSeo  $websiteSeo
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteSeo $websiteSeo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteSeo  $websiteSeo
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteSeo $websiteSeo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteSeo  $websiteSeo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteSeo $websiteSeo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteSeo  $websiteSeo
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteSeo $websiteSeo)
    {
        //
    }
}
