@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add New Student</h1>
        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="university_name" class="block text-sm font-medium text-gray-700">University Name</label>
                    <input type="text" name="university_name" id="university_name" value="LPA" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="admission_year" class="block text-sm font-medium text-gray-700">Admission Year</label>
                    <input type="number" name="admission_year" id="admission_year" value="{{ date('Y') }}" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="course_code" class="block text-sm font-medium text-gray-700">Course Code</label>
                    <input type="text" name="course_code" id="course_code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label for="r_id" class="block text-sm font-medium text-gray-700">Reference ID</label>
                    <input type="text" name="r_id" id="r_id" value="Auto-generated" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label for="passport_number" class="block text-sm font-medium text-gray-700">Passport Number</label>
                    <input type="text" name="passport_number" id="passport_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                    <input type="text" name="nationality" id="nationality" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" name="country" id="country" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" id="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label for="embassy" class="block text-sm font-medium text-gray-700">Embassy</label>
                    <input type="text" name="embassy" id="embassy" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Name and City of Embassy" required>
                </div>
                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label for="student_picture" class="block text-sm font-medium text-gray-700">Student Picture</label>
                    <input type="file" name="student_picture" id="student_picture" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                    <select name="course_id" id="course_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="bank_id" class="block text-sm font-medium text-gray-700">Bank</label>
                    <select name="bank_id" id="bank_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="">Select Bank</option>
                        @foreach($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="agent_id" class="block text-sm font-medium text-gray-700">Agent</label>
                    <select name="agent_id" id="agent_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm searchable-select" required>
                        <option value="">Select Agent Name</option>
                        @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save as new student</button>
            </div>
        </form>
    </div>

    @endsection