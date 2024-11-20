@extends('layouts.app')

@section('content')
<!-- <x-slot name="header">

    </x-slot> -->
<div class="max-w-5xl mx-auto my-4 space-y-6">

    <!-- Dashboard Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <div class="flex space-x-4">
            <button class="bg-gray-200 text-gray-600 font-semibold py-2 px-4 rounded-lg">Monthly</button>
            <button class="bg-white border border-gray-300 text-gray-600 font-semibold py-2 px-4 rounded-lg">Yearly</button>
            <div class="flex items-center bg-white border border-gray-300 text-gray-600 font-semibold py-2 px-4 rounded-lg">
                August 2024
                <span class="ml-2 text-gray-400">&#x25BC;</span>
            </div>
        </div>
    </div>

    <!-- Total Applications Chart -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Total Applications</h2>
            <span class="text-3xl font-bold">129,723</span>
        </div>
        <canvas id="applicationsChart" height="80"></canvas>
    </div>
    <!-- Donut and Pie Charts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Admission Granted Donut Chart -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Admission Granted</h3>
            <canvas id="admissionsChart" height="150"></canvas> <!-- Reduced height to 200px -->
        </div>

        <!-- Mails Sent Pie Chart -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Mails Sent</h3>
            <canvas id="mailsChart" height="150"></canvas> <!-- Reduced height to 200px -->
        </div>
    </div>

</div>

@endsection