<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteBannerController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\WebsiteSeoController;

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
    $social_link = \App\Models\SocialLink::orderBy('id','desc')->get();
    return view('frontend.home' ,compact('social_link'));
});

Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'website', 'as' => 'website.'], function () {
    Route::resource('websiteBanner', WebsiteBannerController::class);
    Route::resource('socialLink', SocialLinkController::class);
    Route::resource('seo', WebsiteSeoController::class);
});



require __DIR__.'/auth.php';
