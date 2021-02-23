<?php

namespace App\Http\Controllers;

use App\Models\WebsiteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteProducts = WebsiteProduct::orderBy('id', 'desc')->get();
        return view('backend.website.website-product.index', compact('websiteProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.website-product.create');
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
            'name' => 'required|string|unique:website_products',
            'status' => 'required|string',
            'short_description'   => 'required|string',
            'image' => 'required|image',
            'long_description' => 'nullable|string',
            'agreement' => 'nullable|string',
            'title' => 'nullable|string',
            'price' => 'nullable|string',
            'serial' => 'required|numeric|unique:website_products',
            'offer_in_percent' => 'nullable|string',
        ]);
        $product = new WebsiteProduct();
        $product->name = $request->name;
        $product->status = $request->status;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->agreement = $request->agreement;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->slug = Str::slug($request->name, "-");
        $product->serial = $request->serial;
        $product->offer_in_percent = $request->offer_in_percent;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/product/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $product->image   = $folder_path . $image_new_name;
        }
        try {
            $product->save();
            return redirect()->route('website.websiteProduct.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteProduct  $websiteProduct
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteProduct $websiteProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteProduct  $websiteProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteProduct $websiteProduct)
    {
        return view('backend.website.website-product.edit', compact('websiteProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteProduct  $websiteProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteProduct $websiteProduct)
    {
        $request->validate([
            'name' => 'required|string|unique:website_products,name,'. $websiteProduct->id,
            'status' => 'required|string',
            'short_description'   => 'required|string',
            'image' => 'nullable|image',
            'long_description' => 'nullable|string',
            'agreement' => 'nullable|string',
            'title' => 'nullable|string',
            'price' => 'nullable|string',
            'serial' => 'required|numeric|unique:website_products,serial,'. $websiteProduct->id,
            'offer_in_percent' => 'nullable|string',
        ]);
        $product = $websiteProduct;
        $product->name = $request->name;
        $product->status = $request->status;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->agreement = $request->agreement;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->slug = Str::slug($request->name, "-");
        $product->serial = $request->serial;
        $product->offer_in_percent = $request->offer_in_percent;

        if($request->hasFile('image')){
            if ($product->image != null)
                File::delete(public_path($product->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/product/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $product->image   = $folder_path . $image_new_name;
        }
        try {
            $product->save();
            return redirect()->route('website.websiteProduct.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteProduct  $websiteProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteProduct $websiteProduct)
    {
        try {
            if ($websiteProduct->image != null)
                File::delete(public_path($websiteProduct->image)); //Old image delete
            $websiteProduct->delete();
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
