<?php

use App\Http\Controllers\CronJobController;
use App\Http\Controllers\EmailCampaignController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LeadCategoryController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadDistrictController;
use App\Http\Controllers\LeadServiceController;
use App\Http\Controllers\LeadThanaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SmsCampaignController;
use App\Models\SocialLink;
use App\Models\WebsiteSeo;
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
    $social_link = SocialLink::where('is_active', true)->orderBy('id','desc')->get();
    $website_seos = WebsiteSeo::where('is_active', true)->orderBy('id','desc')->get();
    return view('frontend.home' ,compact('social_link','website_seos'));
});

Route::group(['as' => 'frontend.'], function () {
   Route::get('lead-collection',[FrontendController::class, 'leadCollectionPage'])->name('leadCollectionPage');
   Route::post('lead-collection',[FrontendController::class, 'storeLead'])->name('storeLead')->middleware(['permission:store_lead']);
   Route::post('lead-import',[FrontendController::class, 'importLead'])->name('importLead')->middleware(['permission:import_lead']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

    Route::group(['prefix' => 'website', 'as' => 'website.'], function () {
        Route::resource('websiteBanner', WebsiteBannerController::class);
        Route::resource('socialLink', SocialLinkController::class);
        Route::resource('websiteSeo', WebsiteSeoController::class);
        Route::resource('WebsiteService', WebsiteServiceController::class);
        Route::post('website-seo-static-option-update', [WebsiteSeoController::class, 'websiteSeoStaticOptionUpdate'])->name('websiteSeoStaticOptionUpdate');
        Route::post('website-service-static-option-update', [WebsiteServiceController::class, 'websiteServiceStaticOptionUpdate'])->name('websiteServiceStaticOptionUpdate');
    });

    Route::group(['prefix' => 'lead', 'as' => 'lead.'], function () {
        Route::resource('leadCategory', LeadCategoryController::class);
        Route::resource('leadDistrict', LeadDistrictController::class);
        Route::resource('leadService', LeadServiceController::class);
        Route::resource('leadThana', LeadThanaController::class);
        Route::resource('lead', LeadController::class);
    });

    Route::group(['prefix' => 'campaign', 'as' => 'campaign.'], function () {
        Route::resource('smsCampaign', SmsCampaignController::class);
        Route::get('run-sms-campaign/{sms_campaign_id}', [SmsCampaignController::class, 'runSmsCampaign'])->name('runSmsCampaign');
        Route::resource('emailCampaign', EmailCampaignController::class);
        Route::get('run-email-campaign/{email_campaign_id}', [EmailCampaignController::class, 'runEmailCampaign'])->name('runEmailCampaign');
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('get-smtp-page', [SettingController::class, 'getSmtpPage'])->name('getSmtpPage');
        Route::post('smtp-update', [SettingController::class, 'smtpUpdate'])->name('smtpUpdate');
        Route::post('smtp-test', [SettingController::class, 'testSmtp'])->name('testSmtp');
    });
});

Route::group(['prefix' => 'cron', 'as' => 'cron.'], function () {

});



require __DIR__.'/auth.php';
