<?php

namespace App\Http\Controllers\admin;

use App\Actions\Admin\CreatePatientExistRegisterAction;
use App\Actions\Admin\UpdatePatientRegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRegister\Admin\PatientExistRegisterRequest;
use App\Http\Requests\PatientRegister\Admin\PatientRegisterUpdateRequest;
use App\Models\Patient;
use App\Models\PatientRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PatientRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.patient-register.index');
    }

    public function getdata()
    {
        $user = auth()->user();

        if ($user['role'] == 'admin') {
            $query = DB::table('patient_registers')
                ->join('patients', 'patient_registers.patient_id', '=', 'patients.id')
                ->select('patient_registers.*', 'patients.nik')
                ->where('patient_registers.deleted_at', null)
                ->orderBy('patient_registers.created_at', 'desc');
        }

        return DataTables::of($query)
            ->addColumn('aksi', function ($register_patient) {
                $register_patient = [
                    'id' => $register_patient->id
                ];
                return view('pages.admin.patient-register.action')->with('register_patient', $register_patient);
            })
            ->editColumn('start_date', function ($register_patient) {
                return Carbon::parse($register_patient->start_date)->format('d M Y');
            })
            ->editColumn('end_date', function ($register_patient) {
                return Carbon::parse($register_patient->start_date)->format('H:i') . ' - ' . Carbon::parse($register_patient->end_date)->format('H:i');
            })
            ->editColumn('created_at', function ($register_patient) {
                return Carbon::parse($register_patient->created_at)->format('d M Y, H:i');
            })
            ->editColumn('updated_at', function ($register_patient) {
                return Carbon::parse($register_patient->updated_at)->format('d M Y, H:i');
            })
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.patient-register.create', [
            'patient' => Patient::all('id', 'nik'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientExistRegisterRequest $request)
    {
        //create new patient register
        $actionPatientExistRegister = new CreatePatientExistRegisterAction();
        return $actionPatientExistRegister->execute($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientRegister  $patientRegister
     * @return \Illuminate\Http\Response
     */
    public function show(PatientRegister $patientRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientRegister  $patientRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientRegister $register_patient)
    {
        return view('pages.admin.patient-register.edit', [
            'patient' => Patient::all('id', 'nik'),
            'register_patient' => $register_patient,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientRegister  $patientRegister
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRegisterUpdateRequest $request, PatientRegister $register_patient)
    {
        //update patient register data
        $actionPatientRegisterUpdate = new UpdatePatientRegisterAction;
        return $actionPatientRegisterUpdate->execute($request, $register_patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientRegister  $patientRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientRegister $register_patient)
    {
        $register_patient->testResult ? $register_patient->testResult->delete() : $register_patient->delete();

        return redirect()->route('admin.register-patient.index');
    }
}
