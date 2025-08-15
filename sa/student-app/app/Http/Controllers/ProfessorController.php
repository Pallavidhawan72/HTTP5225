<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = \App\Models\Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        \App\Models\Professor::create($validated);
        return redirect()->route('professors.index')->with('success', 'Professor created successfully.');
    }

    public function show($id)
    {
        $professor = \App\Models\Professor::findOrFail($id);
        return view('professors.show', compact('professor'));
    }

    public function edit($id)
    {
        $professor = \App\Models\Professor::findOrFail($id);
        return view('professors.edit', compact('professor'));
    }

    public function update(Request $request, $id)
    {
        $professor = \App\Models\Professor::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $professor->update($validated);
        return redirect()->route('professors.index')->with('success', 'Professor updated successfully.');
    }

    public function destroy($id)
    {
        $professor = \App\Models\Professor::findOrFail($id);
        $professor->delete();
        return redirect()->route('professors.index')->with('success', 'Professor deleted successfully.');
    }
}
