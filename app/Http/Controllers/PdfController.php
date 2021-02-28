<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function incomeStream(Income $income){
        $pdf = PDF::loadView('pdf.income', compact('income'));
        return $pdf->stream();;
    }

    public function incomeDownload(Income $income){
        $pdf = PDF::loadView('pdf.income', $income);
        return $pdf->download('invoice.pdf');
    }
}
