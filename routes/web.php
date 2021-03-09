<?php

use App\Http\Controllers\CronJobController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\EmailCampaignController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LeadCategoryController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadDistrictController;
use App\Http\Controllers\LeadServiceController;
use App\Http\Controllers\LeadThanaController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\SmsCampaignController;
use App\Models\SocialLink;
use App\Models\WebsiteSeo;
use App\Models\WebsiteBanner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OfflinePaymentMethodController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectStatusController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\WebsiteBannerController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteSeoController;
use App\Http\Controllers\WebsiteServiceController;
use App\Http\Controllers\WebsiteTeamController;
use App\Http\Controllers\WebsiteProductController;
use App\Http\Controllers\WebsiteContactController;
use App\Http\Controllers\WebsiteCounterController;
use App\Http\Controllers\WebsiteClientController;

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


Route::group(['as' => 'frontend.'], function () {
   Route::get('/',[FrontendController::class, 'homePage'])->name('homePage');
   Route::get('/services',[FrontendController::class, 'servicesPage'])->name('servicesPage');
   Route::get('/services/{slug}',[FrontendController::class, 'servicesDetailsPage'])->name('servicesDetailsPage');
   Route::get('/proposal/{slug}',[FrontendController::class, 'prposalPage'])->name('prposalPage');
   Route::get('/invoice/{slug}',[FrontendController::class, 'invoicePage'])->name('invoicePage');
   Route::post('/subscribe/store',[FrontendController::class, 'subscribeStore'])->name('subscribeStore');
    Route::get('page/{slug}',[FrontendController::class, 'customPage'])->name('customPage');
   Route::get('lead-collection',[FrontendController::class, 'leadCollectionPage'])->name('leadCollectionPage');
   Route::post('lead-collection',[FrontendController::class, 'storeLead'])->name('storeLead')->middleware(['permission:store_lead']);
//   if(get_static_option('is_bulk_import_from_website') == 'yes')
   Route::post('lead-import',[FrontendController::class, 'importLead'])->name('importLead')->middleware(['permission:import_lead']);

   Route::get('contact-us',[FrontendController::class, 'contactUs'])->name('contactUs');
   Route::get('products',[FrontendController::class, 'products'])->name('products');
   Route::post('contact-us/store',[FrontendController::class, 'contactUsStore'])->name('contactUsStore');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile-password-update', [ProfileController::class, 'profilePasswordUpdate'])->name('profilePasswordUpdate');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('user-to-admin-contact-list', [ContactController::class, 'userToAdminContactList'])->name('userToAdminContactList');
    Route::get('user-to-admin-contact-list/{id}', [ContactController::class, 'userToAdminContactListDetails'])->name('userToAdminContactListDetails');
    Route::post('user-to-admin-contact-list-update}', [ContactController::class, 'userToAdminContactListDetailsUpdate'])->name('userToAdminContactListDetailsUpdate');
    Route::group(['prefix' => 'website', 'as' => 'website.'], function () {
        Route::resource('websiteBanner', WebsiteBannerController::class);
        Route::resource('socialLink', SocialLinkController::class);
        Route::resource('websiteSeo', WebsiteSeoController::class);
        Route::resource('websiteService', WebsiteServiceController::class);
        Route::resource('websiteClient', WebsiteClientController::class);
        Route::resource('websiteCounter', WebsiteCounterController::class);
        Route::resource('websiteTeam', WebsiteTeamController::class);
        Route::resource('websiteProduct', WebsiteProductController::class);
        Route::resource('websiteContact', WebsiteContactController::class);
        Route::resource('customPage', CustomPageController::class);
        Route::get('website-counter', [WebsiteServiceController::class, 'websiteCounter'])->name('websiteCounter');
        Route::post('website-counter-update', [WebsiteServiceController::class, 'websiteCounterUpdate'])->name('websiteCounterUpdate');

        Route::post('website-seo-static-option-update', [WebsiteSeoController::class, 'websiteSeoStaticOptionUpdate'])->name('websiteSeoStaticOptionUpdate');
        Route::post('website-service-static-option-update', [WebsiteServiceController::class, 'websiteServiceStaticOptionUpdate'])->name('websiteServiceStaticOptionUpdate');
        Route::post('website-team-static-option-update', [WebsiteTeamController::class, 'websiteTeamStaticOptionUpdate'])->name('websiteTeamStaticOptionUpdate');
    });

    Route::group(['prefix' => 'lead', 'as' => 'lead.'], function () {
        Route::resource('leadCategory', LeadCategoryController::class);
        Route::resource('leadDistrict', LeadDistrictController::class);
        Route::resource('leadService', LeadServiceController::class);
        Route::resource('leadThana', LeadThanaController::class);
        Route::resource('lead', LeadController::class);
        Route::post('lead/change-phone', [LeadController::class, 'leadChangePhone'])->name('leadChangePhone');
        Route::post('lead/category/update', [LeadController::class, 'leadCategoryUpdate'])->name('leadCategoryUpdate');
        Route::post('lead/category/add-with-lead', [LeadController::class, 'leadCategoryAddWithLeads'])->name('leadCategoryAddWithLeads');
        Route::get('getByCategory/{lead_category_id}', [LeadController::class, 'getByCategory'])->name('getByCategory');
        Route::post('lead/get/category', [LeadController::class, 'category']);
        Route::post('lead/category/change', [LeadController::class, 'categoryChange']);
    });

    Route::group(['prefix' => 'campaign', 'as' => 'campaign.'], function () {
        Route::resource('smsCampaign', SmsCampaignController::class);
        Route::get('run-sms-campaign/{sms_campaign_id}', [SmsCampaignController::class, 'runSmsCampaign'])->name('runSmsCampaign');
        Route::resource('emailCampaign', EmailCampaignController::class);
        Route::get('run-email-campaign/{email_campaign_id}', [EmailCampaignController::class, 'runEmailCampaign'])->name('runEmailCampaign');
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('get-smtp-page', [SettingController::class, 'getSmtpPage'])->name('getSmtpPage');
        Route::get('get-general-page', [SettingController::class, 'getGeneralPage'])->name('getGeneralPage');
        Route::get('get-contact-setting-page', [SettingController::class, 'getContactSettingPage'])->name('getContactSettingPage');
        Route::post('contact-page-info-update', [SettingController::class, 'contactPageInfoUpdate'])->name('contactPageInfoUpdate');
        Route::post('smtp-update', [SettingController::class, 'smtpUpdate'])->name('smtpUpdate');
        Route::post('general-update', [SettingController::class, 'generalUpdate'])->name('generalUpdate');
        Route::post('smtp-test', [SettingController::class, 'testSmtp'])->name('testSmtp');
        Route::get('get-sms-page', [SettingController::class, 'getSmsPage'])->name('getSmsPage');
        Route::post('gpcmp-sms-update', [SettingController::class, 'gpcmpSmsUpdate'])->name('gpcmpSmsUpdate');
        Route::post('gpcmp-sms-test', [SettingController::class, 'testGpcmpSms'])->name('testGpcmpSms');
    });

    Route::group(['prefix' => 'communication', 'as' => 'communication.'], function () {
        Route::get('sms', [CommunicationController::class, 'getSmsPage'])->name('getSmsSenderPage');
        Route::post('sms', [CommunicationController::class, 'sendSms'])->name('sendSms');
        Route::get('email', [CommunicationController::class, 'getEmailPage'])->name('getEmailSenderPage');
        Route::post('email', [CommunicationController::class, 'sendEmail'])->name('sendEmail');
    });
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::resource('expenseCategory', ExpenseCategoryController::class);
        Route::resource('expense', ExpenseController::class);
    });
    Route::group(['prefix' => 'sales', 'as' => 'sales.'], function () {
        Route::resource('proposal', ProposalController::class);
        Route::resource('invoice', InvoiceController::class);
        Route::resource('payment', PaymentController::class);
        Route::resource('offlinePaymentMethod', OfflinePaymentMethodController::class);
    });
    Route::resource('project', ProjectController::class);
    Route::resource('projectStatus', ProjectStatusController::class);
    Route::resource('user', UserController::class);
    Route::group(['prefix' => 'pdf', 'as' => 'pdf.'], function () {
        Route::get('proposal/stream/{slug}', [PdfController::class,'proposalStream'])->name('proposalStream');
        Route::get('proposal/download/{slug}',[PdfController::class, 'prposalDownload'])->name('prposalDownload');
        Route::get('invoice/stream/{slug}',[PdfController::class, 'invoiceStream'])->name('invoiceStream');
        Route::get('invoice/download/{slug}',[PdfController::class, 'invoiceDownload'])->name('invoiceDownload');
    });
});


Route::group(['prefix' => 'cron', 'as' => 'cron.'], function () {
    Route::get('auto-job', [CronJobController::class, 'auto_job'])->name('auto_job');
});

Route::group(['prefix' => 'test'], function () {
   Route::get('/message', function (){
       send_message('01304734623', 'Hello message');
   });
});




require __DIR__.'/auth.php';
