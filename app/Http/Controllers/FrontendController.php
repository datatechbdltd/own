<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadCategory;
use App\Models\LeadDistrict;
use App\Models\LeadService;
use App\Models\LeadThana;
use Database\Seeders\LeadSeeder;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function leadCollectionPage(){
        $lead_categories = LeadCategory::orderBy('id', 'desc')->get();
        $lead_services = LeadService::orderBy('id', 'desc')->get();
        $lead_districts = LeadDistrict::orderBy('id', 'desc')->get();
        $lead_thanas = LeadThana::orderBy('id', 'desc')->get();
        $leads = auth()->user()->leads;
        return view('frontend.lead-collection', compact('lead_categories','lead_services','lead_districts','lead_thanas', 'leads'));
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
}
