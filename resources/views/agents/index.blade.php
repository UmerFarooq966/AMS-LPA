@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6">Agents List</h2>
    @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('agents.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Agent</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Email</th>
                    <th class="py-2 px-4 border">Phone</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agents as $agent)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border">{{ $agent->id }}</td>
                    <td class="py-2 px-4 border">{{ $agent->name }}</td>
                    <td class="py-2 px-4 border">{{ $agent->email }}</td>
                    <td class="py-2 px-4 border">{{ $agent->phone }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('agents.show', $agent->id) }}" class="text-blue-500 mr-2">View</a>
                        <a href="{{ route('agents.edit', $agent->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" class="inline-block">
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