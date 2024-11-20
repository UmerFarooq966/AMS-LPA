<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex">

        <!-- Sidebar -->
        <div class="w-32 bg-blue-700">
            @include('layouts.side')
        </div>

        <!-- Submenu Area -->
        <div class="w-52 bg-white shadow-lg">
            <!-- The submenu content is included within layouts.side -->
        </div>

        <!-- Main Content Area -->
        <main class="flex-1 bg-gray-100">
            @include('layouts.navigation') <!-- Top Navigation (if it should be within the main content) -->
            @yield('content')
        </main>

    </div>
</body>


<!-- Chart.js Scripts -->
<script>
    // Dummy data for charts
    const applicationsData = [70, 40, 50, 30, 60, 80, 40, 50, 60, 20, 30, 70, 60, 80, 50, 20, 10, 70, 30, 50, 60, 80, 30, 40, 50, 60, 40, 30, 70, 60];
    const totalApplications = 129723;
    const grantedAdmissions = 1200;
    const totalMails = 1200;
    const mailSent = 400;
    const studentResponses = 800;

    // Applications Received Bar Chart
    const applicationsCtx = document.getElementById('applicationsChart').getContext('2d');
    new Chart(applicationsCtx, {
        type: 'bar',
        data: {
            labels: Array.from({
                length: 30
            }, (_, i) => i + 1),
            datasets: [{
                label: 'Applications Received',
                data: applicationsData,
                backgroundColor: '#3B82F6',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Admissions Granted Donut Chart
    const admissionsCtx = document.getElementById('admissionsChart').getContext('2d');
    new Chart(admissionsCtx, {
        type: 'doughnut',
        data: {
            labels: ['Admissions Granted', 'Total Applications'],
            datasets: [{
                data: [grantedAdmissions, totalApplications - grantedAdmissions],
                backgroundColor: ['#3B82F6', '#E5E7EB'],
                hoverOffset: 4
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });

    // Mails Sent Pie Chart
    const mailsCtx = document.getElementById('mailsChart').getContext('2d');
    new Chart(mailsCtx, {
        type: 'pie',
        data: {
            labels: ['Mail Sent', 'Students Response'],
            datasets: [{
                data: [mailSent, studentResponses],
                backgroundColor: ['#3B82F6', '#9CA3AF'],
                hoverOffset: 4
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
</script>


</html>