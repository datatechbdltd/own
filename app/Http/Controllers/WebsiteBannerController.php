<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBanner;
use Illuminate\Http\Request;

class WebsiteBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = WebsiteBanner::orderBy('id', 'desc')->get();
        return view('backend.website.banner.index', compact('banners'));
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
     * @param  \App\Models\WebsiteBanner  $websiteBanner
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteBanner $websiteBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteBanner  $websiteBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteBanner $websiteBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteBanner  $websiteBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteBanner $websiteBanner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteBanner  $websiteBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteBanner $websiteBanner)
    {
        //
    }
}
