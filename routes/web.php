<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteBannerController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\WebsiteSeoController;
use App\Http\Controllers\WebsiteServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $social_link = \App\Models\SocialLink::where('is_active', true)->orderBy('id','desc')->get();
    $website_seos = \App\Models\WebsiteSeo::where('is_active', true)->orderBy('id','desc')->get();
    return view('frontend.home' ,compact('social_link','website_seos'));
});

Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'website', 'as' => 'website.'], function () {
    Route::resource('websiteBanner', WebsiteBannerController::class);
    Route::resource('socialLink', SocialLinkController::class);
    Route::resource('websiteSeo', WebsiteSeoController::class);
    Route::resource('WebsiteService', WebsiteServiceController::class);
    Route::post('/website-seo-static-option-update', [WebsiteSeoController::class, 'websiteSeoStaticOptionUpdate'])->name('websiteSeoStaticOptionUpdate');
    Route::post('/website-service-static-option-update', [WebsiteServiceController::class, 'websiteServiceStaticOptionUpdate'])->name('websiteServiceStaticOptionUpdate');
});



require __DIR__.'/auth.php';
