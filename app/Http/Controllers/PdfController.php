<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Proposal;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function incomeStream(Income $income){
        $pdf = PDF::loadView('pdf.income', compact('income'));
        return $pdf->stream();;
    }
    // proposal Stream
    public function proposalStream(Proposal $proposal){
        $pdf = PDF::loadView('pdf.proposal', compact('proposal'));
        return $pdf->stream();;
    }

    public function incomeDownload(Income $income){
        $pdf = PDF::loadView('pdf.income', $income);
        return $pdf->download('invoice.pdf');
    }
}
