<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\FeeType;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {

        $fees = Fee::with('student')->get();



        return view('fees.index', compact('fees'));
    }

    public function create()
    {
        $students = Student::all();
        $feeTypes = FeeType::all();
        return view('fees.create', compact('students', 'feeTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_type_id' => 'required|exists:fee_types,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'total_amount' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
        ]);

        $validated['remaining_amount'] = $validated['total_amount'] - $validated['paid_amount'];
        $validated['status'] = $validated['remaining_amount'] == 0 ? 'paid' : ($validated['paid_amount'] > 0 ? 'partial' : 'unpaid');

        Fee::create($validated);

        return redirect()->route('fees.index')->with('success', 'Fee created successfully.');
    }

    public function edit(Fee $fee)
    {
        $students = Student::all();
        $feeTypes = FeeType::all();
        return view('fees.create', compact('fee', 'students', 'feeTypes'));
    }

    public function update(Request $request, Fee $fee)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_type_id' => 'required|exists:fee_types,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'total_amount' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
        ]);

        $validated['remaining_amount'] = $validated['total_amount'] - $validated['paid_amount'];
        $validated['status'] = $validated['remaining_amount'] == 0 ? 'paid' : ($validated['paid_amount'] > 0 ? 'partial' : 'unpaid');

        $fee->update($validated);

        return redirect()->route('fees.index')->with('success', 'Fee updated successfully.');
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()->route('fees.index')->with('success', 'Fee deleted successfully.');
    }
}
