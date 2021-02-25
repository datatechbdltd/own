<?php

namespace App\Http\Controllers;

use App\Models\SmsHistory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CommunicationController extends Controller
{
    public function getSmsPage(Request $request){
        if ($request->ajax()){
            if (auth()->user()->hasRole('admin')) {
                $data = SmsHistory::orderBy('id', 'desc');
                return DataTables::of($data)
                    ->addColumn('sender', function($data) {
                        return $data->sender->name ?? '***';
                    })
                    ->rawColumns(['sender'])
                    ->make(true);
            }else{
                $data = auth()->user()->allMessages;
                return DataTables::of($data)->make(true);
            }
        }else{
            $smsHistory = SmsHistory::all();
            return view('backend.communication.sms', compact('smsHistory'));
        }

    }
    public function sendSms(Request $request){
        $request->validate([
            'phone'     =>  'required|min:11|max:11',
            'message'     =>  'required|min:2|max:250',
        ]);
        $response_of_sent_message = send_message($request->phone, $request->message);
        if ($response_of_sent_message === true){
            return back()->withSuccess('Message successfully sent to '.$request->phone);
        }else{
            return back()->withErrors('Something going wrong. Response: '.$response_of_sent_message);
        }
    }
    public function getEmailPage(){
        return view('backend.communication.email');
    }

    public function sendEmail(Request $request){
        return back()->withErrors('need Update.');
    }
}
