<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::with('level')->get();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('classrooms.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);

        Classroom::create($request->all());

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom created successfully.');
    }

    public function show(Classroom $classroom)
    {
        $classroom->load('teachers', 'students');


        return view('classrooms.show', compact('classroom'));
    }

    public function edit(Classroom $classroom)
    {
        $levels = Level::all();
        return view('classrooms.edit', compact('classroom', 'levels'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);

        $classroom->update($request->all());

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom updated successfully');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom deleted successfully');
    }
}
