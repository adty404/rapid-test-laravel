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
        $user = auth()->user();

        if ($user['role'] == 'admin') {
            $query = PatientRegister::query();
        }

        if (request()->ajax()) {

            return DataTables::of($query)
                ->addColumn('aksi', function ($patientRegister) {
                    $patientRegister = [
                        'id' => $patientRegister->id
                    ];
                    return view('pages.admin.patient-register.action')->with('patientRegister', $patientRegister);
                })
                ->addColumn('nik', function($patientRegister){
                    return $patientRegister->patient['nik'];
                })
                ->addColumn('start_date', function($patientRegister){
                    return Carbon::parse($patientRegister->start_date)->format('d M Y');
                })
                ->addColumn('end_date', function($patientRegister){
                    return Carbon::parse($patientRegister->start_date)->format('H:i') . ' - ' . Carbon::parse($patientRegister->end_date)->format('H:i');
                })
                ->addColumn('created_at', function($patientRegister){
                    return Carbon::parse($patientRegister->created_at)->format('d M Y, H:i');
                })
                ->addColumn('updated_at', function($patientRegister){
                    return Carbon::parse($patientRegister->updated_at)->format('d M Y, H:i');
                })
                ->addIndexColumn()
                ->rawColumns(['aksi', 'nik', 'start_date', 'end_date', 'created_at', 'updated_at'])
                ->make(true);
        }
        return view('pages.admin.patient-register.index');
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
    public function destroy(PatientRegister $patientRegister)
    {
        //
    }
}
