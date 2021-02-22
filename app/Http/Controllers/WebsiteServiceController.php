<?php

namespace App\Http\Controllers;

use App\Models\WebsiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteServices = WebsiteService::orderBy('id', 'desc')->get();
        return view('backend.website.website-service.index', compact('websiteServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.website-service.create');
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
            'name' => 'nullable|string',
            'status' => 'required|string',
            'short_description'   => 'required|string',
            'url'   => 'nullable|string',
            'image' => 'nullable|image',
            'long_description' => 'nullable|string',
            'agreement' => 'nullable|string',
        ]);
        $service = new WebsiteService();
        $service->name = $request->name;
        $service->is_active = $request->status;
        $service->short_description = $request->short_description;
        $service->url = $request->url;
        $service->long_description = $request->long_description;
        $service->agreement = $request->agreement;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/service/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $service->icon   = $folder_path . $image_new_name;
        }
        try {
            $service->save();
            return redirect()->route('website.WebsiteService.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteService  $websiteService
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteService $websiteService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteService  $websiteService
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteService $websiteService)
    {
        return view('backend.website.website-service.edit', compact('websiteService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteService  $websiteService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteService $websiteService)
    {
        $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string',
            'status'   => 'required|string',
            'short_description'   => 'nullable|string',
            'long_description' => 'nullable|string',
            'url' => 'nullable',
            'agreement' => 'nullable|string',
        ]);

        $service =  $websiteService;
        $service->name   = $request->name;
        $service->is_active = $request->status;
        $service->short_description = $request->short_description;
        $service->long_description   = $request->long_description;
        $service->url   = $request->url;
        $service->agreement  = $request->agreement;
        if($request->hasFile('image')){
            if ($websiteService->icon != null)
                File::delete(public_path($websiteService->icon)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/service/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $service->icon   = $folder_path . $image_new_name;
        }
        try {
            $websiteService->save();
            return redirect()->route('website.websiteService.index')->withToastSuccess('Successfully updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteService  $websiteService
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteService $websiteService)
    {
        try {
            if ($websiteService->icon != null)
             File::delete(public_path($websiteService->icon)); //Old image delete
            $websiteService->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }

    public function websiteServiceStaticOptionUpdate(Request $request){
        $request->validate([
            'our_service' => 'nullable|min:3',
            'service_highlight' => 'nullable|min:3',
            'service_description' => 'nullable|min:3',
            'service_link' => 'nullable|min:3',
        ]);
        try {
            update_static_option('our_service', $request->our_service);
            update_static_option('service_highlight', $request->service_highlight);
            update_static_option('service_description', $request->service_description);
            update_static_option('service_link', $request->service_link);
        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
        return redirect()->route('website.WebsiteService.index')->withToastSuccess( 'Service Updated successfully');

    }

    //website counter static option
    public function websiteCounter(){
        return view('backend.website.website-service.counter');
    }
    //website counter static update
    public function websiteCounterUpdate(Request $request){
        $request->validate([
            'real_members' => 'nullable|min:3',
            'counter_highlight' => 'nullable|min:3',
            'counter_image' => 'nullable|image',
            'counter_description' => 'nullable|min:3',
            'active_clients' => 'nullable|min:3',
            'active_clients_number' => 'nullable|min:3',
            'team_advisors' => 'nullable|min:3',
            'team_advisors_number' => 'nullable|min:3',
            'projects_done' => 'nullable|min:3',
            'projects_done_number' => 'nullable|min:3',
            'glorious_years' => 'nullable|min:3',
            'glorious_years_number' => 'nullable|min:3',
        ]);
        try {
            update_static_option('real_members', $request->real_members);
            update_static_option('counter_highlight', $request->counter_highlight);

            update_static_option('counter_description', $request->counter_description);
            update_static_option('active_clients', $request->active_clients);
            update_static_option('active_clients_number', $request->active_clients_number);
            update_static_option('team_advisors', $request->team_advisors);
            update_static_option('team_advisors_number', $request->team_advisors_number);
            update_static_option('projects_done', $request->projects_done);
            update_static_option('projects_done_number', $request->projects_done_number);
            update_static_option('glorious_years', $request->glorious_years);
            update_static_option('glorious_years_number', $request->glorious_years_number);

            if($request->hasFile('counter_image')){
                if (get_static_option('counter_image') != null)
                    File::delete(public_path(get_static_option('counter_image'))); //Old image delete
                $image             = $request->file('counter_image');
                $folder_path       = 'uploads/images/website/counter/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('counter_image',$folder_path.$image_new_name);
            }
        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
        return back()->withToastSuccess( 'Service Updated successfully');
    }
}
