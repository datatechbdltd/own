<?php

namespace App\Http\Controllers;

use App\Models\WebsiteClient;
use App\Models\WebsiteCounter;
use App\Models\WebsiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteClients = WebsiteClient::orderBy('id', 'desc')->get();
        return view('backend.website.website-client.index', compact('websiteClients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.website-client.create');
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
            'name' =>  'required|string',
            'designation' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'company_url' => 'required|string',
            'serial'   => 'required|numeric|unique:website_clients,serial',
            'image' => 'required|image',
            'company_logo' => 'required|image',
        ]);

        $client = new WebsiteClient();
        $client->name = $request->name;
        $client->designation = $request->designation;
        $client->title = $request->title;
        $client->description = $request->description;
        $client->is_active = $request->status;
        $client->company_url = $request->company_url;
        $client->serial = $request->serial;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/client/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $client->image   = $folder_path . $image_new_name;
        }

        if($request->hasFile('company_logo')){
            $image             = $request->file('company_logo');
            $folder_path       = 'uploads/images/website/client/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $client->company_logo   = $folder_path . $image_new_name;
        }
        try {
            $client->save();
            return redirect()->route('website.websiteClient.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteClient  $websiteClient
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteClient $websiteClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteClient  $websiteClient
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteClient $websiteClient)
    {
        return view('backend.website.website-client.edit', compact('websiteClient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteClient  $websiteClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteClient $websiteClient)
    {
        $request->validate([
            'name' =>  'required|string',
            'designation' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'company_url' => 'required|string',
            'serial'   => 'nullable|numeric|unique:website_clients,serial,'.$websiteClient->id,
            'image' => 'nullable|image',
            'company_logo' => 'nullable|image',
        ]);

        $client = $websiteClient;
        $client->name = $request->name;
        $client->designation = $request->designation;
        $client->title = $request->title;
        $client->description = $request->description;
        $client->is_active = $request->status;
        $client->company_url = $request->company_url;
        $client->serial = $request->serial;

        if($request->hasFile('image')){
            if ($websiteClient->image != null)
                File::delete(public_path($websiteClient->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/client/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $client->image   = $folder_path . $image_new_name;
        }
        if($request->hasFile('company_logo')){
            if ($websiteClient->company_logo != null)
                File::delete(public_path($websiteClient->company_logo)); //Old image delete
            $image             = $request->file('company_logo');
            $folder_path       = 'uploads/images/website/client/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $client->company_logo   = $folder_path . $image_new_name;
        }
        try {
            $client->save();
            return redirect()->route('website.websiteClient.index')->withToastSuccess('Successfully updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteClient  $websiteClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteClient $websiteClient)
    {
        try {
            if ($websiteClient->image != null)
                File::delete(public_path($websiteClient->image)); //Old image delete
            if ($websiteClient->company_logo != null)
                File::delete(public_path($websiteClient->company_logo)); //Old image delete

            $websiteClient->delete();
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
