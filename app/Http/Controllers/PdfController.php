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
        $meta_description = $proposal->description;
        $pdf = PDF::loadView('pdf.proposal', compact('proposal', 'meta_description'));
        return $pdf->stream(config('app.name').'-proposal-'.$proposal->slug.'.pdf');
    }
    // prposal download
    public function prposalDownload($slug){
        $proposal = Proposal::where('slug',$slug)->first();
        $pdf = PDF::loadView('pdf.proposal', compact('proposal',));
        return $pdf->download(config('app.name').'-proposal-'.$proposal->slug.'.pdf');
    }

     // invoice stream
     public function invoiceStream($slug){
        $invoice = Invoice::where('slug',$slug)->first();
        $meta_description = 'Invoice from DATATECH BD LTD. Invoice no:'. $invoice->invoice_id;
        $pdf = PDF::loadView('pdf.invoice', compact('invoice', 'meta_description'));
        return $pdf->stream(config('app.name').'-invoice-'.$invoice->slug.'.pdf');
    }
    // invoice download
    public function invoiceDownload($slug){
        $invoice = Invoice::where('slug',$slug)->first();
        $pdf = PDF::loadView('pdf.invoice', compact('invoice'));
        return $pdf->download(config('app.name').'-invoice-'.$invoice->slug.'.pdf');
    }

    // pad stream
     public function companyPadStream($slug){
        $company_pad = CompanyPad::where('slug',$slug)->first();
        $meta_description = $company_pad->description;
        $pdf = PDF::loadView('pdf.company-pad', compact('company_pad', 'meta_description'));
        return $pdf->stream(config('app.name').'-ID-'.$company_pad->id.'.pdf');
    }
    // pad download
    public function companyPadDownload($slug){
        $company_pad = CompanyPad::where('slug',$slug)->first();
        $pdf = PDF::loadView('pdf.company-pad', compact('company_pad'));
        return $pdf->download(config('app.name').'-ID-'.$company_pad->id.'.pdf');
    }


}
