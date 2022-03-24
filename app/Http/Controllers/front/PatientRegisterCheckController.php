<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\PatientRegister;
use Illuminate\Http\Request;

class PatientRegisterCheckController extends Controller
{
    public function index()
    {
        return view('pages.front.check-patient-register.index');
    }

    public function check($register_number)
    {
        $patient_register = PatientRegister::where('register_number', $register_number)->first();
        if ($patient_register) {
            return view('pages.front.check-patient-register.index', compact('patient_register'));
        } else {
            return redirect()->route('check-patient-register.index')->with('error', 'ไม่พบข้อมูลที่ต้องการ');
        }
    }
}
