<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBanner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

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
        return view('backend.website.banner.create');
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
            'title' => 'nullable|string',
            'highlight' => 'required|string',
            'description'   => 'required|string',
            'btn_url'   => 'nullable|string',
            'video_url' => 'nullable|string',
            'image' => 'nullable|image|max:500|mimes:jpeg,jpg,png',
            'color' => 'nullable|string',
            'serial'    => 'nullable|numeric|unique:website_banners,serial',
            'status' => 'required|boolean',
        ]);
        $websiteBanner = new WebsiteBanner();
        $websiteBanner->title   = $request->title;
        $websiteBanner->highlight   = $request->highlight;
        $websiteBanner->description = $request->description;
        $websiteBanner->btn_url = $request->btn_url;
        $websiteBanner->video_url   = $request->video_url;
        $websiteBanner->color   = $request->color;
        $websiteBanner->serial  = $request->serial;
        $websiteBanner->is_active  = $request->status;
        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/banner/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $websiteBanner->image   = $folder_path . $image_new_name;
        }
        try {
            $websiteBanner->save();
            return redirect()->route('website.websiteBanner.index')->withToastSuccess('Successfully store');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
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
        return view('backend.website.banner.edit', compact('websiteBanner'));
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
        $request->validate([
            'title' => 'nullable|string',
            'highlight' => 'required|string',
            'description'   => 'required|string',
            'btn_url'   => 'nullable|string',
            'video_url' => 'nullable|string',
            'image' => 'nullable|image|max:500|mimes:jpeg,jpg,png',
            'color' => 'nullable|string',
            'serial'    => 'nullable|numeric|unique:website_banners,serial,'.$websiteBanner->id,
            'status' => 'required|boolean',
        ]);

        $websiteBanner->title   = $request->title;
        $websiteBanner->highlight   = $request->highlight;
        $websiteBanner->description = $request->description;
        $websiteBanner->btn_url = $request->btn_url;
        $websiteBanner->video_url   = $request->video_url;
        $websiteBanner->color   = $request->color;
        $websiteBanner->serial  = $request->serial;
        $websiteBanner->is_active  = $request->status;
        if($request->hasFile('image')){
            //delete old image
            File::delete(public_path( $websiteBanner->image));
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/banner/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $websiteBanner->image   = $folder_path . $image_new_name;
        }
        try {
            $websiteBanner->save();
            return redirect()->route('website.websiteBanner.index')->withToastSuccess('Successfully updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * @param WebsiteBanner $websiteBanner
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(WebsiteBanner $websiteBanner)
    {
        try {
            if ($websiteBanner->image != null)
            File::delete(public_path($websiteBanner->image)); //Old image delete

            $websiteBanner->delete();
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
        return response()->json([
            'type' => 'success',
        ]);
    }
}
