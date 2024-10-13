<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('levels.index', compact('levels'));
    }

    public function create()
    {
        return view('levels.create');
    }
    public function show(Level $level)
    {
        $classrooms = $level->classrooms;
        return view('levels.show', compact('level', 'classrooms'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:levels|max:255',
        ]);

        Level::create($request->all());

        return redirect()->route('levels.index')
            ->with('success', 'Level created successfully.');
    }

    public function edit(Level $level)
    {
        return view('levels.edit', compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|unique:levels,name,' . $level->id . '|max:255',
        ]);

        $level->update($request->all());

        return redirect()->route('levels.index')
            ->with('success', 'Level updated successfully');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('levels.index')
            ->with('success', 'Level deleted successfully');
    }
}
