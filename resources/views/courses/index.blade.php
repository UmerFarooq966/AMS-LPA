@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6">Courses</h2>
    @if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Course</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border">Course Level</th>
                    <th class="py-2 px-4 border">Course Name</th>
                    <th class="py-2 px-4 border">Final Qualification</th>
                    <th class="py-2 px-4 border">Hours per Week</th>
                    <th class="py-2 px-4 border">Status</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td class="py-2 px-4 border">{{ $course->course_level }}</td>
                    <td class="py-2 px-4 border">{{ $course->course_name }}</td>
                    <td class="py-2 px-4 border">{{ $course->final_qualification }}</td>
                    <td class="py-2 px-4 border">{{ $course->hours_per_week }}</td>
                    <td class="py-2 px-4 border">{{ $course->status }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-500 mr-2">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection