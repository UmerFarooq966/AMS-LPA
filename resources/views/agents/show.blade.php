@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Agent Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-lg font-medium text-gray-600">Name</h3>
                <p class="text-gray-800">{{ $agent->name }}</p>
            </div>
            <div>
                <h3 class="text-lg font-medium text-gray-600">Email</h3>
                <p class="text-gray-800">{{ $agent->email }}</p>
            </div>
            <div>
                <h3 class="text-lg font-medium text-gray-600">Phone</h3>
                <p class="text-gray-800">{{ $agent->phone }}</p>
            </div>
            <div>
                <h3 class="text-lg font-medium text-gray-600">Address</h3>
                <p class="text-gray-800">{{ $agent->address }}</p>
            </div>
        </div>
    </div>
    <div class="mt-6 flex justify-end">
        <a href="{{ route('agents.index') }}"
            class="inline-block bg-blue-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-300">
            Back to Agents List
        </a>
    </div>
</div>
@endsection