<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function index()
    {
        $parents = Parents::all();
        return view('parents.index', compact('parents'));
    }

    public function show(Parents $parent)
    {
        return view('parents.show', compact('parent'));
    }
    public function edit(Parents $parent)
    {
        return view('parents.edit', compact('parent'));
    }

    public function update(Request $request, Parents $parent)
    {
        $validated = $request->validate([
            'father_first_name' => 'required|max:50',
            'father_last_name' => 'required|max:50',
            'father_occupation' => 'required|max:100',
            'father_phone' => 'required|max:20',
            'father_email' => 'required|email|max:100',
            'mother_first_name' => 'required|max:50',
            'mother_last_name' => 'required|max:50',
            'mother_occupation' => 'required|max:100',
            'mother_phone' => 'required|max:20',
            'mother_email' => 'required|email|max:100',
            'home_address' => 'required',
        ]);

        $parent->update($validated);

        return redirect()->route('parents.show', $parent)->with('success', 'Parent updated successfully');
    }

    public function destroy(Parents $parent)
    {
        $parent->delete();
        return redirect()->route('parents.index')->with('success', 'Parent deleted successfully');
    }
}