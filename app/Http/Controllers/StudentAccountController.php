<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\FeeInvoice;
use App\Models\FundAccount;
use Illuminate\Http\Request;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentAccountController extends Controller
{
    public function create($student_id)
    {
        $student = Student::findOrFail($student_id);
        $feeInvoices = FeeInvoice::where('student_id', $student_id)
            ->where('amount', '>', DB::raw('IFNULL((SELECT SUM(credit) FROM student_accounts WHERE fee_invoice_id = fee_invoices.id), 0)'))
            ->get();
        return view('student_accounts.create', compact('student', 'feeInvoices'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_invoice_id' => 'required|exists:fee_invoices,id',
            'credit' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $studentAccount = StudentAccount::create([
            'student_id' => $validatedData['student_id'],
            'fee_invoice_id' => $validatedData['fee_invoice_id'],
            'date' => $validatedData['date'],
            'type' => 'payment',
            'credit' => $validatedData['credit'],
            'description' => $validatedData['description'] ?? 'Payment received',
        ]);

        return redirect()->route('students.show', $validatedData['student_id'])
            ->with('success', 'Payment recorded successfully.');
    }
    public function payInvoice($student_id)
    {
        // Find the student by ID
        $student = Student::findOrFail($student_id);

        // Find any outstanding invoices for the student
        $outstandingInvoices = FeeInvoice::where('student_id', $student_id)
            ->where('amount', '>', DB::raw('IFNULL((SELECT SUM(credit) FROM student_accounts WHERE fee_invoice_id = fee_invoices.id), 0)'))
            ->get();

        // Return a view that shows the outstanding invoices and payment form
        return view('student_accounts.pay_invoice', compact('student', 'outstandingInvoices'));
    }
    // public function processPayment(Request $request, $student_id)
    // {
    //     // Validate the payment request
    //     $validatedData = $request->validate([
    //         'invoice_id' => 'required|exists:fee_invoices,id',
    //         'payment_amount' => 'required|numeric|min:0',
    //     ]);

    //     // Find the invoice based on the validated invoice_id
    //     $feeInvoice = FeeInvoice::findOrFail($validatedData['invoice_id']);

    //     // Check if the payment amount exceeds the remaining balance
    //     $remainingBalance = $feeInvoice->amount - ($feeInvoice->payments()->sum('credit') ?? 0);

    //     if ($validatedData['payment_amount'] > $remainingBalance) {
    //         return redirect()->back()->with('error', 'Payment exceeds the remaining balance.');
    //     }

    //     // Logic to process the payment
    //     $studentAccountData = [
    //         'date' => now(),
    //         'type' => 'credit',  // Assuming this is a credit transaction
    //         'fee_invoice_id' => $feeInvoice->id,
    //         'student_id' => $student_id,
    //         'Debit' => null,  // Assuming this is a credit transaction
    //         'credit' => $validatedData['payment_amount'],  // The amount being paid
    //         'description' => 'Payment for Invoice ID: ' . $feeInvoice->id,
    //     ];

    //     // Create the student account entry for the payment
    //     StudentAccount::create($studentAccountData);

    //     // Generate receipt data
    //     $receiptData = [
    //         'date' => now(),
    //         'student_id' => $student_id,
    //         'Debit' => null,  // Assuming this is a credit transaction
    //         'description' => 'Receipt for payment of $' . number_format($validatedData['payment_amount'], 2) . ' for Invoice ID: ' . $feeInvoice->id,
    //     ];

    //     // Create the receipt entry
    //     ReceiptStudent::create($receiptData);


    //     // Optionally, you could mark the invoice as paid by updating its status
    //     // $feeInvoice->update(['status' => 'paid']);

    //     return redirect()->route('student.pay_invoice', ['student' => $student_id])
    //         ->with('success', 'Payment processed successfully! Remaining balance: $' . number_format($remainingBalance - $validatedData['payment_amount'], 2));
    // }
    public function processPayment(Request $request, $student_id)
    {
        // Validate the payment request
        $validatedData = $request->validate([
            'invoice_id' => 'required|exists:fee_invoices,id',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        // Find the invoice based on the validated invoice_id
        $feeInvoice = FeeInvoice::findOrFail($validatedData['invoice_id']);

        // Check if the payment amount exceeds the remaining balance
        $remainingBalance = $feeInvoice->amount - ($feeInvoice->payments()->sum('credit') ?? 0);

        if ($validatedData['payment_amount'] > $remainingBalance) {
            return redirect()->back()->with('error', 'Payment exceeds the remaining balance.');
        }

        // Logic to process the payment
        $studentAccountData = [
            'date' => now(),
            'type' => 'credit',  // Assuming this is a credit transaction
            'fee_invoice_id' => $feeInvoice->id,
            'student_id' => $student_id,
            'Debit' => null,  // Assuming this is a credit transaction
            'credit' => $validatedData['payment_amount'],  // The amount being paid
            'description' => 'Payment for Invoice ID: ' . $feeInvoice->id,
        ];

        // Create the student account entry for the payment
        $studentAccount = StudentAccount::create($studentAccountData);

        // Generate receipt data
        $receiptData = [
            'date' => now(),
            'student_id' => $student_id,
            'Debit' => null,  // Assuming this is a credit transaction
            'description' => 'Receipt for payment of $' . number_format($validatedData['payment_amount'], 2) . ' for Invoice ID: ' . $feeInvoice->id,
        ];

        // Create the receipt entry
        $receipt = ReceiptStudent::create($receiptData);

        // Generate fund account entry linked to the receipt
        $fundAccountData = [
            'date' => now(),
            'receipt_id' => $receipt->id,
            'Debit' => null,  // Assuming this is a credit transaction
            'credit' => $validatedData['payment_amount'],  // The amount being credited
            'description' => 'Fund entry for payment of $' . number_format($validatedData['payment_amount'], 2) . ' against Receipt ID: ' . $receipt->id,
        ];

        // Create the fund account entry
        FundAccount::create($fundAccountData);

        // Optionally, you could mark the invoice as paid by updating its status
        // $feeInvoice->update(['status' => 'paid']);

        return redirect()->route('student.pay_invoice', ['student' => $student_id])
            ->with('success', 'Payment processed successfully! Remaining balance: $' . number_format($remainingBalance - $validatedData['payment_amount'], 2));
    }
}
