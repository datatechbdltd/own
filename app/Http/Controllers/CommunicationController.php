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
            return view('backend.communication.sms');
        }

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
