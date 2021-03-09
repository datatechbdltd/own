<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $total_payment = Payment::sum('amount');
        $total_expense = Expense::sum('amount');
        $total_user = User::get()->count();
        $total_invoice_amount = Invoice::sum('product_price') + Invoice::sum('service_price') + Invoice::sum('other_price');

        $total_due = $total_payment - $total_invoice_amount;

        return view('backend.dashboard.index',compact('total_payment','total_due','total_expense','total_user'));
    }
}
