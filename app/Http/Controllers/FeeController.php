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
        $fees = Fee::all();
        return view('fees.index', compact('fees'));
    }

    public function create()
    {
        return view('fees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'year' => 'required|string',
        ]);

        Fee::create($validatedData);

        return redirect()->route('fees.index')->with('success', 'Fee created successfully.');
    }
}
