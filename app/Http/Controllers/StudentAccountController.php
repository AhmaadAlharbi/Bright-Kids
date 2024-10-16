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
    public function processPayment(Request $request, $student_id)
    {
        // Validate the payment request
        $validatedData = $request->validate([
            'invoice_id' => 'required|exists:fee_invoices,id',
            'payment_amount' => 'required|numeric|min:0.01', // Allow decimals, minimum amount is 0.01
        ]);

        // Find the invoice based on the validated invoice_id
        $feeInvoice = FeeInvoice::findOrFail($validatedData['invoice_id']);

        // Calculate the remaining balance on the invoice
        $totalPayments = $feeInvoice->payments()->sum('credit') ?? 0;
        $remainingBalance = $feeInvoice->amount - $totalPayments;

        // Ensure the payment doesn't exceed the remaining balance
        if ($validatedData['payment_amount'] > $remainingBalance) {
            return redirect()->back()->with('error', 'Payment exceeds the remaining balance.');
        }

        // Process the payment in the student's account
        $studentAccountData = [
            'date' => now(),
            'type' => 'credit',
            'fee_invoice_id' => $feeInvoice->id,
            'student_id' => $student_id,
            'Debit' => null,
            'credit' => $validatedData['payment_amount'],  // Record the payment
            'description' => 'Payment for Invoice : ' . $feeInvoice->fee->title,
        ];

        // Create a new entry in the StudentAccount for this payment
        $studentAccount = StudentAccount::create($studentAccountData);

        // Generate receipt data for the payment
        $receiptData = [
            'date' => now(),
            'student_id' => $student_id,
            'Debit' => null,
            'description' => 'Receipt for payment of $' . number_format($validatedData['payment_amount'], 2) . ' for Invoice ID: ' . $feeInvoice->fee->title,
        ];

        // Create a new receipt for the payment
        $receipt = ReceiptStudent::create($receiptData);

        // Create a fund account entry associated with the receipt
        $fundAccountData = [
            'date' => now(),
            'receipt_id' => $receipt->id,
            'Debit' => null,
            'credit' => $validatedData['payment_amount'],  // Record the fund transaction
            'description' => 'Fund entry for payment of $' . number_format($validatedData['payment_amount'], 2) . ' against Receipt ID: ' . $receipt->id,
        ];

        // Create the fund account entry
        FundAccount::create($fundAccountData);

        // Optionally, mark the invoice as fully paid if the balance is now zero
        if ($remainingBalance == $validatedData['payment_amount']) {
            $feeInvoice->update(['status' => 'paid']);
        }

        // Redirect to the student payment page with success message
        return redirect()->route('students.index', ['student' => $student_id])
            ->with('success', 'Payment processed successfully! Remaining balance: $' . number_format($remainingBalance - $validatedData['payment_amount'], 2));
    }
}
