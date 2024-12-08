@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6">Edit Agent</h2>
    <form action="{{ route('agents.update', $agent->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ $agent->name }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ $agent->email }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>
        <div>
            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ $agent->phone }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="col-span-1 md:col-span-2">
            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
            <textarea name="address" id="address" rows="3"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>{{ $agent->address }}</textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600 focus:ring-2 focus:ring-green-300">
            Update
        </button>
    </form>
</div>
@endsection