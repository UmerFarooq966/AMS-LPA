@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Deleted Students</h1>

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if ($students->isEmpty())
    <p class="text-gray-500">No deleted students available.</p>
    @else
    <table class="min-w-full bg-white border">
        <thead>
            <tr class="w-full border-b">
                <th class="py-2 px-4 text-left">Student ID</th>
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Gender</th>
                <th class="py-2 px-4 text-left">Course</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr class="w-full border-b">
                <td class="py-2 px-4">{{ $student->r_id }}</td>
                <td class="py-2 px-4">{{ $student->first_name }} {{ $student->last_name }}</td>
                <td class="py-2 px-4">{{ $student->gender }}</td>
                <td class="py-2 px-4">{{ $student->course->course_name }}</td>
                <td class="py-2 px-4">
                    <form action="{{ route('student.restore', $student->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded">Restore</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $students->links() }}
    </div>
    @endif
</div>
@endsection