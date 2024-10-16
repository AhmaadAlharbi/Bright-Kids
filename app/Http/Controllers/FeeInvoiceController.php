<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Level;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Models\StudentAccount;
use App\Http\Controllers\Controller;

class FeeInvoiceController extends Controller
{
    public function create($student_id)
    {
        $student = Student::findOrFail($student_id);
        $fees = Fee::all();
        return view('fee_invoices.create', compact('student', 'fees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_id' => 'required|exists:fees,id',
            'amount' => 'required|numeric',

            'description' => 'nullable|string',
        ]);
        $student = Student::findOrFail($validatedData['student_id']);
        $level_id = $student->classroom->level->id;   // Access the level_id through the relationship
        $classroom_id = $student->classroom_id;       // Access the classroom_id directly from the student

        // Add the retrieved level_id and classroom_id to the validated data
        $validatedData['level_id'] = $level_id;
        $validatedData['classroom_id'] = $classroom_id;

        // Automatically add the current date for the invoice_date
        $validatedData['invoice_date'] = now();

        // Create the fee invoice with the complete data
        $feeInvoice = FeeInvoice::create($validatedData);

        // After the fee invoice is created, automatically create a student account entry
        // $studentAccountData = [
        //     'date'            => now(),  // Use the current date
        //     'type'            => 'debit',  // Example: set as debit (can be credit if needed)
        //     'fee_invoice_id'  => $feeInvoice->id,
        //     'student_id'      => $feeInvoice->student_id,
        //     'Debit'           => $feeInvoice->amount,  // The amount is a debit
        //     'credit'          => null,  // No credit in this case
        //     'description'     => $feeInvoice->description,
        // ];

        // // Create the student account entry
        // StudentAccount::create($studentAccountData);
        return redirect()->route('students.show', $validatedData['student_id'])
            ->with('success', 'Fee assigned to student successfully.');
    }
}