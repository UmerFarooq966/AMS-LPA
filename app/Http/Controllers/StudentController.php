<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Bank;
use App\Models\Course;
use App\Models\Email;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with(['course', 'bank', 'agent'])
            ->filter($request->only(['search', 'sort']))
            ->whereNull('deleted_at')
            ->paginate(10);

        $availableEmails = Email::select('id', 'email')->get();

        return view('student.index', compact('students', 'availableEmails'));
    }


    // Show the form to add a new student
    public function create()
    {

        $courses = Course::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('student.create', compact('courses', 'banks', 'agents'));
    }

    // Store a new student in the database
    public function store(Request $request)
    {

        $validated = $request->validate([
            'university_name' => 'required|string|max:255',
            'admission_year' => 'required|integer',
            'course_code' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'student_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'required|string',
            'passport_number' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'embassy' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'bank_id' => 'required|exists:banks,id',
            'agent_id' => 'required|exists:agents,id',
        ]);


        $year = Carbon::now()->year;
        $baseId = ($year - 2023) * 1000 + 1000;
        $studentCount = Student::whereYear('created_at', $year)->withTrashed()->count() + 1;
        $rId = $baseId + $studentCount;

        $student = new Student(array_merge($validated, ['r_id' => $rId]));

        if ($request->hasFile('student_picture')) {
            $path = $request->file('student_picture')->store('student_pictures', 'public');
            $student->student_picture = $path;
        }

        $student->save();

        return redirect()->route('student.index')->with('success', 'Student added successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('student.edit', compact('student', 'courses', 'banks', 'agents'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'course_code' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'student_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|string',
            'passport_number' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'embassy' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'bank_id' => 'required|exists:banks,id',
            'agent_id' => 'nullable|exists:agents,id', // Allow agent_id to be null
        ]);

        $student = Student::findOrFail($id);
        $student->fill($validated);

        // Handle student picture upload
        if ($request->hasFile('student_picture')) {
            $path = $request->file('student_picture')->store('student_pictures', 'public');
            $student->student_picture = $path;
        }

        // If agent_id is empty, set it to null
        if (empty($request->input('agent_id'))) {
            $student->agent_id = null;
        }

        $student->save();

        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }


    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete(); // Soft delete

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }

    public function showDeleted()
    {
        $students = Student::onlyTrashed()->paginate(10);
        return view('student.deleted', compact('students'));
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();

        return redirect()->route('student.index')->with('success', 'Student restored successfully.');
    }


    public function viewQrStudent()
    {
        // Display the password input form for the student to enter ID and passport number
        return view('student.password_form');
    }


    public function verifyPassword(Request $request)
    {
        $studentId = $request->input('r_id');
        $passportNumber = $request->input('password');

        // Retrieve the student based on the r_id
        $student = Student::where('r_id', $studentId)->first();

        if ($student && $student->passport_number === $passportNumber) {
            // Passport number is correct, show the student details
            return view('student.details', compact('student'));
        } else {
            // Incorrect details, show an error
            return back()->withErrors(['password' => 'Incorrect student ID or passport number. Please try again.']);
        }
    }
}
