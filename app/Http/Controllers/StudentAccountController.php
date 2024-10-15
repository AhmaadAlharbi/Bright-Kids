<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
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
}
