<?php

namespace App\Http\Controllers;

use App\Models\WebsiteTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteTeams= WebsiteTeam::orderBy('id', 'desc')->get();
        return view('backend.website.website-team.index', compact('websiteTeams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.website-team.create');
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
            'name' => 'required|string|unique:website_teams',
            'designation' => 'required|string',
            'facebook_link' => 'nullable|string',
            'twitter_link' => 'nullable|string',
            'github_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'serial' => 'required|numeric|unique:website_teams',
            'status' => 'required|numeric',
            'image' => 'required|image',
        ]);
        $team = new WebsiteTeam();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->facebook_link = $request->facebook_link;
        $team->twitter_link = $request->twitter_link;
        $team->github_link = $request->github_link;
        $team->linkedin_link = $request->linkedin_link;
        $team->slug = Str::slug($request->name, "-");
        $team->serial = $request->serial;
        $team->status = $request->status;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/team/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $team->image   = $folder_path . $image_new_name;
        }
        try {
            $team->save();
            return redirect()->route('website.websiteTeam.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteTeam  $websiteTeam
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteTeam $websiteTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteTeam  $websiteTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteTeam $websiteTeam)
    {
        return view('backend.website.website-team.edit', compact('websiteTeam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteTeam  $websiteTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteTeam $websiteTeam)
    {
        $request->validate([
            'name' => 'required|string|unique:website_teams,name,'. $websiteTeam->id,
            'designation' => 'required|string',
            'facebook_link' => 'nullable|string',
            'twitter_link' => 'nullable|string',
            'github_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'serial' => 'required|numeric|unique:website_teams,serial,'. $websiteTeam->id,
            'status' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $team = $websiteTeam;
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->facebook_link = $request->facebook_link;
        $team->twitter_link = $request->twitter_link;
        $team->github_link = $request->github_link;
        $team->linkedin_link = $request->linkedin_link;
        $team->slug = Str::slug($request->name, "-");
        $team->serial = $request->serial;
        $team->status = $request->status;
        if($request->hasFile('image')){
            if ($team->image != null)
                File::delete(public_path($team->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/team/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $team->image   = $folder_path . $image_new_name;
        }
        try {
            $team->save();
            return redirect()->route('website.websiteTeam.index')->withToastSuccess('Successfully updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteTeam  $websiteTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteTeam $websiteTeam)
    {
        try {
            if ($websiteTeam->image != null)
                File::delete(public_path($websiteTeam->image)); //Old image delete
            $websiteTeam->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }

    // team related static option update
    public function websiteTeamStaticOptionUpdate(Request $request){
        $request->validate([
            'team_title' => 'nullable|min:3',
            'team_highlight' => 'nullable|min:3',
            'team_description' => 'nullable|min:3',
        ]);
        try {
            update_static_option('team_title', $request->team_title);
            update_static_option('team_highlight', $request->team_highlight);
            update_static_option('team_description', $request->team_description);
        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
        return redirect()->route('website.websiteTeam.index')->withToastSuccess( 'Team Updated successfully');
    }
}
