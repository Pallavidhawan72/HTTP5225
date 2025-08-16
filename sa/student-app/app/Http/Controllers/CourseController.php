<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = \App\Models\Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professors = \App\Models\Professor::all();
        return view('courses.create', compact('professors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreCourseRequest $request)
    {
        $data = $request->validated();
        $data['professor_id'] = $request->input('professor_id');
        $course = \App\Models\Course::create($data);
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = \App\Models\Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = \App\Models\Course::findOrFail($id);
        $professors = \App\Models\Professor::all();
        return view('courses.edit', compact('course', 'professors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdateCourseRequest $request, $id)
    {
        $course = \App\Models\Course::findOrFail($id);
        $data = $request->validated();
        $data['professor_id'] = $request->input('professor_id');
        $course->update($data);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = \App\Models\Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
