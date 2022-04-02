<?php

namespace App\Http\Controllers\front;

use App\Actions\CreatePatientExistRegisterAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\PatientCheckRequest;
use App\Http\Requests\Patient\PatientRequest;
use App\Http\Requests\Patient\PatientUpdateRequest;
use App\Http\Requests\PatientRegister\PatientExistRegisterRequest;
use App\Models\Patient;
use App\Models\PatientRegister;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.front.patient.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($patient)
    {
        $patient = Patient::where('nik', $patient)->first();

        if (!$patient) {
            return redirect()->route('patient.index')->with('data', 'NIK tidak ditemukan!');
        }

        $patientRegister = PatientRegister::where('patient_id', $patient->id)->latest('id')->first();

        return view('pages.front.patient.show', [
            'patient' => $patient,
            'patientRegister' => $patientRegister
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $patient = Patient::where('nik', $nik)->first();

        if (!$patient) {
            return redirect()->route('patient.index')->with('data', 'NIK tidak ditemukan!');
        }

        return view('pages.front.patient.edit', [
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdateRequest $request, Patient $patient)
    {
        $patient->update($request->all());

        Alert::success('Success', 'Berhasil mengubah data, silakan lanjut mendaftar');
        return redirect()->route('patient.register', $patient->nik);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(PatientCheckRequest $request)
    {
        $patient = Patient::where('nik', $request->nik)->first();

        if ($patient) {
            return redirect()->route('patient.show', $request->nik);
        }

        return redirect()->route('patient.index')->with('data', 'NIK tidak ditemukan!');
    }

    public function register($nik)
    {
        $patient = Patient::where('nik', $nik)->first();

        if (!$patient) {
            return redirect()->route('patient.index')->with('data', 'NIK tidak ditemukan!');
        }

        return view('pages.front.patient.register', [
            'patient' => $patient,
        ]);
    }

    public function register_store(PatientExistRegisterRequest $request)
    {
        $patient = new Patient;
        $is_patient_exist = $patient->is_patient_exist($request->all());

        if (!$is_patient_exist) {
            Alert::error('Error', 'NIK tidak ditemukan');
            return redirect()->route('patient.index');
        }

        //create new patient register
        $actionPatientExistRegister = new CreatePatientExistRegisterAction();
        return $actionPatientExistRegister->execute($request, $is_patient_exist);

    }
}
