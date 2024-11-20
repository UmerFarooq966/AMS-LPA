<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mock data
        $data = [
            'totalApplications' => 129723,
            'admissionsGranted' => 1200,
            'mailsSent' => 1200,
            'studentsResponse' => 800,
            'applicationsReceived' => [
                // Mock data for daily applications (array of values)
                70,
                55,
                65,
                75,
                60,
                65,
                50,
                40,
                70,
                60,
                75,
                80,
                90,
                100,
                60,
                45,
                70,
                80,
                50,
                65,
                60,
                75,
                80,
                90,
                50,
                60,
                70,
                80,
                65,
                55,
            ]
        ];

        return view('dashboard.index', compact('data'));
    }
}
