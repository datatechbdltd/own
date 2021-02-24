<?php

namespace App\Http\Controllers;

use App\Models\WebsiteContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function userToAdminContactList(Request $request){
        if ($request->ajax()){
                $data = WebsiteContact::orderBy('id', 'desc')->get();
                return DataTables::of($data)
                    ->addColumn('Action', function($data) {
                        return '<a type="button" href="'.route('userToAdminContactListDetails', $data->id).'" class="btn btn-outline-success waves-effect waves-light active activated-item">Show</a>';
                    })
                    ->rawColumns(['Action'])
                    ->make(true);
        }else{
            return view('backend.contact.index');
        }
    }
//    contact details
    public function userToAdminContactListDetails ($id){
        $contact_details = WebsiteContact::findOrFail($id);
        return view('backend.contact.details',compact('contact_details'));
    }

    // contact update
    public function userToAdminContactListDetailsUpdate(Request $request){
        $request->validate([
            'contact_id' => 'required|numeric|unique:website_contacts,id,'. $request->contact_id,
            'discussion' => 'nullable|string',
            'is_process_complete' => 'required|numeric',
        ]);

        $contact = WebsiteContact::findOrFail($request->contact_id);
        $contact->discussion = $request->discussion;
        $contact->is_process_complete = $request->is_process_complete;
        $contact->process_by = Auth::user()->id;

        try {
            $contact->save();
            return back()->withToastSuccess('Successfully updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }
}
