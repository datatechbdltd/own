<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsAndEmailController extends Controller
{
    public function getSmsPage(){
        return view('backend.communication.sms');
    }
    public function sendSms(Request $request){
        $request->validate([
            'phone'     =>  'required|min:11|max:11',
            'message'     =>  'required|min:5|max:250',
        ]);
        if (send_message($request->phone, $request->message) === true){
            return back()->withSuccess('Message successfully sent to '.$request->phone);
        }else{
            return back()->withErrors('Something going wrong.');
        }
    }
    public function getEmailPage(){
        return view('backend.communication.email');
    }

    public function sendEmail(Request $request){
        return back()->withErrors('need Update.');
    }
}
