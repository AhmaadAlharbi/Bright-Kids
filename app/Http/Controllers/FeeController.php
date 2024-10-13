<?php

namespace App\Http\Controllers;

use App\Models\Fee;
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
        return view('fees.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'total_amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
        ]);

        $fee = new Fee($validatedData);
        $fee->remaining_amount = $fee->total_amount;
        $fee->save();

        return redirect()->route('fees.index')->with('success', 'Fee added successfully.');
    }

    public function show(Fee $fee)
    {
        return view('fees.show', compact('fee'));
    }

    public function edit(Fee $fee)
    {
        $students = Student::all();
        return view('fees.edit', compact('fee', 'students'));
    }

    public function update(Request $request, Fee $fee)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'total_amount' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0|max:' . $fee->total_amount,
            'due_date' => 'required|date',
        ]);

        $fee->update($validatedData);
        $fee->remaining_amount = $fee->total_amount - $fee->paid_amount;
        $fee->status = $fee->remaining_amount == 0 ? 'paid' : ($fee->paid_amount > 0 ? 'partial' : 'unpaid');
        $fee->save();

        return redirect()->route('fees.index')->with('success', 'Fee updated successfully.');
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();
        return redirect()->route('fees.index')->with('success', 'Fee deleted successfully.');
    }
}
