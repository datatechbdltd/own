<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_links = SocialLink::orderBy('id', 'desc')->get();
        return view('backend.website.social-link.index', compact('social_links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.social-link.create');
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

            'url' => 'required|required',
            'name' => 'required|required',
            'status' => 'required',
            'icon' => 'required|image',
        ]);
        $socliallink = new SocialLink();
        $socliallink->url = $request->url;
        $socliallink->name = $request->name;
        $socliallink->is_active = $request->status;

        if ($request->hasFile('icon')) {
            $image             = $request->file('icon');
            $folder_path       = 'uploads/images/website/social-link/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $socliallink->icon = $folder_path.$image_new_name;
        }
        try {

            $socliallink->save();
            return redirect()->route('website.socialLink.index')->withToastSuccess( 'Social link created successfully');

        }catch (\Exception $exception){

            return back()->withErrors( 'Something went wrong !'.$exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $socialLink)
    {
        return view('backend.website.social-link.edit',compact('socialLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLink $socialLink)
    {
        $request->validate([

            'url' => 'required|required',
            'name' => 'required|required',
            'status' => 'required',
            'icon' => 'nullable|image',
        ]);
        $socliallink = $socialLink;
        $socliallink->url = $request->url;
        $socliallink->name = $request->name;
        $socliallink->is_active = $request->status;


        if ($request->hasFile('icon')) {
            if ($socliallink->icon != null)
                File::delete(public_path($socliallink->icon)); //Old image delete

            $image             = $request->file('icon');
            $folder_path       = 'uploads/images/website/social-link/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $socliallink->icon = $folder_path.$image_new_name;
        }
        try {

            $socliallink->save();
            return redirect()->route('website.socialLink.index')->withToastSuccess( 'Social link updated successfully');

        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $socialLink)
    {
        if ($socialLink->exists()){
            $social_link = $socialLink;
            try {
                if ($social_link->icon != null)
                    File::delete(public_path($social_link->icon)); //Old image delete
                $social_link->delete();
                return redirect()->back()->withToastSuccess('Successfully deleted');
            }catch (\Exception $exception){
                return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
            }
        }else{
            return redirect()->back()->withErrors('Invalid Social link.');
        }
    }
}
