<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

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
        $request->validate([
            'text' => 'required',
            'status' => 'required',
            'icon' => 'required|image',
        ]);
        $website_seo = new WebsiteSeo();
        $website_seo->text = $request->text;
        $website_seo->is_active = $request->status;

        if ($request->hasFile('icon')) {
            $image             = $request->file('icon');
            $folder_path       = 'uploads/images/website/seo/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $website_seo->icon = $folder_path.$image_new_name;
        }
        try {

            $website_seo->save();
            return redirect()->route('website.websiteSeo.index')->withToastSuccess( 'Seo created successfully');

        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
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
        return view('backend.website.seo.edit',compact('websiteSeo'));
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
        $request->validate([
            'text' => 'required',
            'status' => 'required',
            'icon' => 'nullable|image',
        ]);
        $website_seo = $websiteSeo;
        $website_seo->text = $request->text;
        $website_seo->is_active = $request->status;

        if ($request->hasFile('icon')) {
            if ($website_seo->icon != null)
                File::delete(public_path($website_seo->icon)); //Old image delete
            $image             = $request->file('icon');
            $folder_path       = 'uploads/images/website/seo/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $website_seo->icon = $folder_path.$image_new_name;
        }
        try {

            $website_seo->save();
            return redirect()->route('website.websiteSeo.index')->withToastSuccess( 'Seo Updated successfully');

        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteSeo  $websiteSeo
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteSeo $websiteSeo)
    {
        try {
            if ($websiteSeo->icon != null)
            File::delete(public_path($websiteSeo->icon)); //Old image delete

            $websiteSeo->delete();
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
        return response()->json([
            'type' => 'success',
        ]);
    }

    public function websiteSeoStaticOptionUpdate(Request $request){
        $request->validate([
            'level_title' => 'nullable:min:3',
            'level_video_link' => 'nullable:min:3',
            'level_image' => 'nullable|image',
            'who_we_are' => 'nullable:min:3',
            'seo_highlight' => 'nullable|min:5',
            'seo_description' => 'nullable|min:10',
            'seo_image' => 'nullable|image'
        ]);

        if ($request->hasFile('seo_image')) {
            try {
                if (get_static_option('seo_image') != null)
                    File::delete(public_path(get_static_option('seo_image'))); //Old image delete

                $image             = $request->file('seo_image');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);

                update_static_option('seo_image', $folder_path.$image_new_name);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something going wrong',
                ]);
            }

        }
        if ($request->hasFile('level_image')) {
            try {
                if (get_static_option('level_image') != null)
                    File::delete(public_path(get_static_option('level_image'))); //Old image delete

                $image             = $request->file('level_image');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);

                update_static_option('level_image', $folder_path.$image_new_name);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something going wrong',
                ]);
            }
        }
        try {
            update_static_option('seo_highlight', $request->seo_highlight);
            update_static_option('seo_description', $request->seo_description);
            update_static_option('who_we_are', $request->who_we_are);
            update_static_option('level_title', $request->level_title);
            update_static_option('level_video_link', $request->level_video_link);
        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
        return redirect()->route('website.websiteSeo.index')->withToastSuccess( 'Seo Updated successfully');

    }
}
