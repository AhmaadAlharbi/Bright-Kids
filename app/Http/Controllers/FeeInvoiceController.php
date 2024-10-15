<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Level;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
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
            'due_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $feeInvoice = FeeInvoice::create($validatedData);

        return redirect()->route('students.show', $validatedData['student_id'])
            ->with('success', 'Fee assigned to student successfully.');
    }
}
