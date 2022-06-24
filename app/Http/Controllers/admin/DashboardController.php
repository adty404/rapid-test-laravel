<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientRegister;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'total_pasien' => Patient::count(),
            'total_registration_today' => PatientRegister::whereDate('created_at', date('Y-m-d'))->count(),
            'total_rapid_test_done_today' => PatientRegister::has('testResult')->whereDate('created_at', date('Y-m-d'))->count(),
            'total_rapid_test_not_done_today' => PatientRegister::whereDoesntHave('testResult')->whereDate('created_at', date('Y-m-d'))->count(),
        ]);
    }
}
