<?php

namespace App\Http\Controllers;

use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        // Fetch all payments along with related invoices and students
        $payments = StudentAccount::with(['feeInvoice', 'student'])->get();

        // Fetch all receipt data
        $receipts = ReceiptStudent::with('student')->get();

        // Summarize total payments across all students
        $totalPayments = StudentAccount::sum('credit');

        // Summarize the total outstanding fees across all invoices
        $totalOutstanding = FeeInvoice::sum('amount') - StudentAccount::sum('credit');

        return view('payments.index', [
            'payments' => $payments,
            'receipts' => $receipts,
            'totalPayments' => $totalPayments,
            'totalOutstanding' => $totalOutstanding,
        ]);
    }
}
