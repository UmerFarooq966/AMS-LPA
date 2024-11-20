<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Course;
use App\Models\Email;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course', 'bank')->whereNull('deleted_at')->paginate(10); // Fetch students with their related course, and paginate results
        $availableEmails = Email::select('id', 'email')->get(); // Make sure you have both 'id' and 'email' fields
        return view('student.index', compact('students', 'availableEmails'));
    }



    // Show the form to add a new student
    public function create()
    {

        $courses = Course::all();
        $banks = Bank::all();
        return view('student.create', compact('courses', 'banks'));
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
        return view('student.edit', compact('student', 'courses', 'banks'));
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
            'date_of_birth' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'bank_id' => 'required|exists:banks,id',
        ]);

        $student = Student::findOrFail($id);
        $student->fill($validated);

        if ($request->hasFile('student_picture')) {
            $path = $request->file('student_picture')->store('student_pictures', 'public');
            $student->student_picture = $path;
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




    public function viewQrStudent($id)
    {
        // Display the password input form for the student
        return view('student.password_form', ['studentId' => $id]);
    }

    public function verifyPassword(Request $request)
    {
        $studentId = $request->input('student_id');
        $password = $request->input('password');

        // Retrieve the student based on the ID
        $student = Student::find($studentId);

        if ($student && $student->passport_number === $password) {
            // Password is correct, show the student details
            return view('student.details', compact('student'));
        } else {
            // Password is incorrect, show an error
            return back()->withErrors(['password' => 'Incorrect password. Please try again.']);
        }
    }
}
