<?php

namespace App\Http\Controllers;

use App\Imports\LeadImport;
use App\Mail\WebsiteContactUsMail;
use App\Models\CustomPage;
use App\Models\Lead;
use App\Models\LeadCategory;
use App\Models\LeadDistrict;
use App\Models\LeadService;
use App\Models\LeadThana;
use App\Models\SocialLink;
use App\Models\WebsiteBanner;
use App\Models\WebsiteCounter;
use App\Models\WebsiteProduct;
use App\Models\WebsiteContact;
use App\Models\WebsiteSeo;
use App\Models\WebsiteService;
use App\Models\WebsiteTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class FrontendController extends Controller
{
    public function homePage(){
        $social_link = SocialLink::where('is_active', true)->orderBy('id','desc')->get();
        $webiste_banners = WebsiteBanner::where('is_active', true)->orderBy('serial','asc')->get();
        $website_seos = WebsiteSeo::where('is_active', true)->orderBy('id','desc')->get();
        $website_services = WebsiteService::where('is_active', true)->orderBy('id','desc')->limit(6)->get();
        $website_teams = WebsiteTeam::where('status', true)->orderBy('serial','asc')->get();
        if (get_static_option('frontend_style') == 'Second Style'){
            $website_counters = WebsiteCounter::where('status',true)->orderBy('serial','asc')->get();
            return view('frontend2.home' ,compact('social_link','website_seos','webiste_banners','website_services','website_teams','website_counters'));
        }else{
            return view('frontend.home' ,compact('social_link','website_seos','webiste_banners','website_services','website_teams'));
        }
    }
    // all services pages
    public function servicesPage(){
        $website_services = WebsiteService::where('is_active', true)->orderBy('id','desc')->get();
        return view('frontend.services' ,compact('website_services'));
    }
    // all services Details Page
    public function servicesDetailsPage($slug){
        $service = WebsiteService::where('is_active', true)->where('slug',$slug)->first();
        return view('frontend.service-details' ,compact('service'));
    }
    public function leadCollectionPage(){
        $lead_categories = LeadCategory::orderBy('id', 'desc')->get();
        $lead_services = LeadService::orderBy('id', 'desc')->get();
        $lead_districts = LeadDistrict::orderBy('id', 'desc')->get();
        $lead_thanas = LeadThana::orderBy('id', 'desc')->get();
        if (Auth::check()){
            $leads = auth()->user()->leads;
            return view('frontend.lead-collection', compact('lead_categories','lead_services','lead_districts','lead_thanas', 'leads'));
        }else{
            return view('frontend.lead-collection');
        }

    }

    public function storeLead(Request $request){
        if (!$request->phone && !$request->email){
            return back()->withErrors('Please insert email or phone');
        }
        $request->validate([
            'email' => 'nullable|email|unique:leads',
            'phone' => 'nullable|string|unique:leads',
        ]);

        $lead = new Lead();
        $lead->add_by_id    =   auth()->user()->id;
        $lead->service_id   =   $request->service_id;
        $lead->district_id  =   $request->district_id;
        $lead->thana_id =   $request->thana_id;
        $lead->name =   $request->name;
        $lead->email    =   $request->email;
        $lead->phone    =   $request->phone;
        $lead->date_of_birth    =   $request->date_of_birth;
        $lead->gender   =   $request->gender;
        $lead->is_married   =   $request->is_married;
        $lead->company_name =   $request->company_name;
        $lead->profession   =   $request->profession;
        $lead->address  =   $request->address;
        $lead->company_website  =   $request->company_website;
        $lead->company_facebook_page    =   $request->company_facebook_page;
        $lead->description  =   $request->description;
        $lead->save();
        return back()->withToastSuccess('Successfully inserted');
    }

    public function importLead(Request $request)
    {
        try {
            Excel::import(new LeadImport, $request->file('file'));
            return back()->withSuccess('Import completed');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '. $exception->getMessage());
        }
    }

    // contact us page
    public function contactUs(){
        return view('frontend.contact-us');
    }
    // products page
    public function products(){
        $website_products = WebsiteProduct::where('status', true)->get();
        return view('frontend.products', compact('website_products'));
    }

    // contact us store
    public function contactUsStore(Request $request){
        $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $contact = new WebsiteContact();
        $contact->name   = $request->name;
        $contact->email   = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        try {
            $contact->save();
            if(get_static_option('is_active_website_contact_submission_mail_to_visitor') == 'yes'){
                Mail::to($request->email)->send(new WebsiteContactUsMail($contact));
            }
            if(get_static_option('is_active_website_contact_submission_sms_to_office') == 'yes'){
                send_message(get_static_option('reporting_phone'), 'Visitor knocked you, please contact to .'.$contact->phone);
            }
            Mail::to(get_static_option('reporting_email'))->send(new WebsiteContactUsMail($contact));

            if(get_static_option('is_active_website_contact_submission_sms_to_visitor') == 'yes'){
                send_message($request->phone, 'Thank you for message us. You can call us:'.get_static_option('reporting_phone').' DATATECH BD LTD.');
            }
            return back()->withSuccess('Thank you for contact us ! Confirmation send to your phone/email.');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    public function customPage($slug){
        $customPage = CustomPage::where('slug', $slug)->first();
        return view('frontend.custom-page', compact('customPage'));
    }

    // store subscribers
    public function subscribeStore(Request $request){
        $request->validate([
            'email'=> 'required|email|unique:leads,email'
        ]);

        $lead = new Lead();
        $lead->email = $request->email;
        try {
            $lead->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Subscribed !.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong. ',
            ]);
        }
    }
}
