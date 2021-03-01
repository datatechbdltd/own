<?php

namespace App\Http\Controllers;

use App\Models\WebsiteCounter;
use App\Models\WebsiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteCounters = WebsiteCounter::orderBy('id', 'desc')->get();
        return view('backend.website.website-counter.index', compact('websiteCounters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.website-counter.create');
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
            'title' => 'required|string',
            'number' => 'required|string',
            'serial'   => 'required|numeric|unique:website_counters,serial',
            'status'   => 'required|string',
            'image' => 'required|image',
        ]);
        $counter = new WebsiteCounter();
        $counter->title = $request->title;
        $counter->number = $request->number;
        $counter->serial = $request->serial;
        $counter->status = $request->status;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/counter/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $counter->image   = $folder_path . $image_new_name;
        }
        try {
            $counter->save();
            return redirect()->route('website.websiteCounter.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteCounter  $websiteCounter
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteCounter $websiteCounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteCounter  $websiteCounter
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteCounter $websiteCounter)
    {
        return view('backend.website.website-counter.edit', compact('websiteCounter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteCounter  $websiteCounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteCounter $websiteCounter)
    {
        $request->validate([
            'title' => 'nullable|string',
            'number' => 'nullable|string',
            'serial'   => 'nullable|numeric|unique:website_counters,serial,'.$websiteCounter->id,
            'status'   => 'nullable|string',
            'image' => 'nullable|image',
        ]);
        $counter = $websiteCounter;
        $counter->title = $request->title;
        $counter->number = $request->number;
        $counter->serial = $request->serial;
        $counter->status = $request->status;

        if($request->hasFile('image')){
            if ($websiteCounter->image != null)
                File::delete(public_path($websiteCounter->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/counter/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $counter->image   = $folder_path . $image_new_name;
        }
        try {
            $websiteCounter->save();
            return redirect()->route('website.websiteCounter.index')->withToastSuccess('Successfully updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteCounter  $websiteCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteCounter $websiteCounter)
    {
        try {
            if ($websiteCounter->image != null)
                File::delete(public_path($websiteCounter->image)); //Old image delete
            $websiteCounter->delete();
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
