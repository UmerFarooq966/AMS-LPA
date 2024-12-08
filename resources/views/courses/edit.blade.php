@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6">Edit Course</h2>
    <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="course_level" class="block text-sm font-medium text-gray-700">Course Level</label>
            <input type="text" name="course_level" id="course_level" value="{{ $course->course_level }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="course_name" class="block text-sm font-medium text-gray-700">Course Name</label>
            <input type="text" name="course_name" id="course_name" value="{{ $course->course_name }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="final_qualification" class="block text-sm font-medium text-gray-700">Final Qualification</label>
            <input type="text" name="final_qualification" id="final_qualification" value="{{ $course->final_qualification }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="hours_per_week" class="block text-sm font-medium text-gray-700">Hours per Week</label>
            <input type="number" name="hours_per_week" id="hours_per_week" value="{{ $course->hours_per_week }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <input type="text" name="status" id="status" value="{{ $course->status }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="commencement_date" class="block text-sm font-medium text-gray-700">Commencement Date</label>
            <input type="date" name="commencement_date" id="commencement_date" value="{{ $course->commencement_date }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="course_duration" class="block text-sm font-medium text-gray-700">Course Duration</label>
            <input type="text" name="course_duration" id="course_duration" value="{{ $course->course_duration }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="course_completion_date" class="block text-sm font-medium text-gray-700">Course Completion Date</label>
            <input type="date" name="course_completion_date" id="course_completion_date" value="{{ $course->course_completion_date }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="tuition_fee" class="block text-sm font-medium text-gray-700">Tuition Fee</label>
            <input type="number" step="0.01" name="tuition_fee" id="tuition_fee" value="{{ $course->tuition_fee }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <label for="registration_fee" class="block text-sm font-medium text-gray-700">Registration Fee</label>
            <input type="number" step="0.01" name="registration_fee" id="registration_fee" value="{{ $course->tuition_fee }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Course</button>
        </div>
    </form>
</div>
@endsection