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
        $website_service = WebsiteService::orderBy('id', 'desc')->get();
        return view('backend.website.website-service.index', compact('website_service'));
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
        //
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
        //
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
            //if ($websiteService->icon != null)
             //File::delete(public_path($websiteService->icon)); //Old image delete
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
            'our_service' => 'nullable:min:3',
            'service_highlight' => 'nullable:min:3',
            'service_description' => 'nullable|min:3',
            'service_link' => 'nullable:min:3',
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
}
