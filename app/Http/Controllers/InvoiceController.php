<?php

namespace App\Http\Controllers;

use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Models\ReceiptStudent;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $receipt = ReceiptStudent::findOrFail($id);
        $student = $receipt->student;
        $feeInvoices = FeeInvoice::where('student_id', $student->id)->get();

        return view('invoices.show', compact('receipt', 'student', 'feeInvoices'));
    }
}
