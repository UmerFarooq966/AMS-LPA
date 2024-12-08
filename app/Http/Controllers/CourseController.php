<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_level' => 'required|string',
            'course_name' => 'required|string',
            'final_qualification' => 'required|string',
            'hours_per_week' => 'required|integer',
            'status' => 'required|string',
            'commencement_date' => 'required|date',
            'course_duration' => 'required|string',
            'course_completion_date' => 'required|date',
            'tuition_fee' => 'required|numeric',
            'registration_fee' => 'required|numeric',

        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_level' => 'required|string',
            'course_name' => 'required|string',
            'final_qualification' => 'required|string',
            'hours_per_week' => 'required|integer',
            'status' => 'required|string',
            'commencement_date' => 'required|date',
            'course_duration' => 'required|string',
            'course_completion_date' => 'required|date',
            'tuition_fee' => 'required|numeric',
            'registration_fee' => 'required|numeric',

        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}