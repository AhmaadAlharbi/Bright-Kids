<?php

namespace App\Http\Controllers;

use App\Models\FeeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeeTypeController extends Controller
{
    public function index()
    {
        $feeTypes = FeeType::all();
        return view('fee_types.index', compact('feeTypes'));
    }

    public function create()
    {
        return view('fee_types.edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_recurring' => 'boolean',
            'billing_period' => 'required|in:one-time,monthly,quarterly,annually',
        ]);

        FeeType::create($validated);

        return redirect()->route('fee-types.index')->with('success', 'Fee type created successfully.');
    }

    public function edit(FeeType $feeType)
    {
        return view('fee_types.edit', compact('feeType'));
    }

    public function update(Request $request, FeeType $feeType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_recurring' => 'boolean',
            'billing_period' => 'required|in:one-time,monthly,quarterly,annually',
        ]);

        $feeType->update($validated);

        return redirect()->route('fee-types.index')->with('success', 'Fee type updated successfully.');
    }

    public function destroy(FeeType $feeType)
    {
        $feeType->delete();

        return redirect()->route('fee-types.index')->with('success', 'Fee type deleted successfully.');
    }
}
