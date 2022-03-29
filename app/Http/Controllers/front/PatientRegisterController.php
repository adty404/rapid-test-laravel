<?php

namespace App\Http\Controllers\front;

use App\Action\CreatePatientAction;
use App\Action\CreatePatientRegisterAction;
use App\Action\IsPatientExistAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PatientRegister;
use App\Http\Requests\Patient\PatientRequest;
use App\Http\Requests\PatientRegister\PatientRegisterRequest;
use App\Models\Patient;
use RealRashid\SweetAlert\Facades\Alert;

class PatientRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.front.patient-register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $patientRequest, PatientRegisterRequest $patientRegisterRequest)
    {
        //is patient exist?
        $patient = new Patient();
        $is_patient_exist = $patient->is_patient_exist($patientRequest);

        if ($is_patient_exist) {
            return redirect()->route('patient.show', $is_patient_exist->nik);
        }

        //create new patient
        $actionPatient = new CreatePatientAction();
        $actionPatient->execute($patientRequest);

        //create new patient register
        $actionPatientRegister = new CreatePatientRegisterAction();
        return $actionPatientRegister->execute($patientRegisterRequest, $actionPatient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientRegister  $patient_register
     * @return \Illuminate\Http\Response
     */
    public function show(PatientRegister $patient_register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientRegister  $patient_register
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientRegister $patient_register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientRegister  $patient_register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientRegister $patient_register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientRegister  $patient_register
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientRegister $patient_register)
    {
        //
    }

    public function success($register_number)
    {
        $patientRegister = PatientRegister::where('register_number', $register_number)->first();
        if (!$patientRegister) {
            Alert::error('Error', 'Nomor Pendaftaran tidak ditemukan');
            return redirect()->route('patient-register.index');
        }
        return view('pages.front.patient-register.success-register', [
            'data' => $patientRegister,
        ]);
    }
}
