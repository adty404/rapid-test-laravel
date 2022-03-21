<?php

namespace App\Http\Controllers;

use App\Action\CreatePatientAction;
use App\Action\CreatePatientRegisterAction;
use Illuminate\Http\Request;
use App\Models\PatientRegister;
use App\Http\Requests\Patient\PatientRequest;
use App\Http\Requests\PatientRegister\PatientRegisterRequest;

class PatientRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.front.patient-register');
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
        //create new patient
        $actionPatient = new CreatePatientAction();
        $actionPatient->execute($patientRequest);

        //create new patient register
        $actionPatientRegister = new CreatePatientRegisterAction();
        $actionPatientRegister->execute($patientRegisterRequest, $actionPatient);
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
}
