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

    public function check(Request $request)
    {
        $this->validate($request, [
            'register_number' => 'required|string|max:255',
        ]);

        $patientRegister = PatientRegister::where('register_number', $request->register_number)->first();

        if ($patientRegister) {
            // return 'ada ' . $patientRegister->register_number;
            return redirect()->route('check-patient-register.show', $request->register_number);
        }

        return redirect()->route('check-patient-register.index')->with('data', 'Nomor Registrasi tidak ditemukan!');
    }

    public function show($registerNumber)
    {
        $patientRegister = PatientRegister::where('register_number', $registerNumber)->first();
        if (!$patientRegister) {
            return redirect()->route('check-patient-register.index')->with('data', 'Nomor Registrasi tidak ditemukan!');
        }

        return view('pages.front.check-patient-register.show', [
            'data' => $patientRegister,
            'link' => route('check-patient-register.show', $patientRegister->register_number),
        ]);
    }
}
