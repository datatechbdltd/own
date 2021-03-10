<?php

namespace App\Http\Controllers;

use App\Models\CompanyPad;
use App\Models\Invoice;
use App\Models\Proposal;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{

    // proposal Stream
    public function proposalStream($slug){
        $proposal = Proposal::where('slug',$slug)->first();
        $pdf = PDF::loadView('pdf.proposal', compact('proposal',));
        //return $pdf->download($invoice->invoice_id.'.pdf');
        return $pdf->stream(config('app.name').'-'.$proposal->slug.'.pdf');
    }
    // prposal download
    public function prposalDownload($slug){
        $proposal = Proposal::where('slug',$slug)->first();
        return view('pdf.proposal' ,compact('proposal'));
    }

     // invoice stream
     public function invoiceStream($slug){
        $invoice = Invoice::where('slug',$slug)->first();
        $pdf = PDF::loadView('pdf.invoice', compact('invoice'));
        return $pdf->stream();
    }
    // invoice download
    public function invoiceDownload($invoice_id){
        $invoice = Invoice::where('invoice_id',$invoice_id)->first();
        return view('pdf.invoice' ,compact('invoice'));
    }

    // pad stream
     public function companyPadStream($slug){
        $company_pad = CompanyPad::where('slug',$slug)->first();
        $pdf = PDF::loadView('pdf.company-pad', compact('company_pad'));
        return $pdf->stream();
    }
    // pad download
    public function companyPadDownload($invoice_id){
        $company_pad = CompanyPad::where('invoice_id',$invoice_id)->first();
        return view('pdf.company-pad' ,compact('company_pad'));
    }


}
