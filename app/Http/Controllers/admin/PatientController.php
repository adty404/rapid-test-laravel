<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\PatientRequest;
use App\Http\Requests\Patient\PatientUpdateRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
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
            $query = Patient::query();
        }

        if (request()->ajax()) {

            return DataTables::of($query)
                ->addColumn('aksi', function ($patient) {
                    $patient = [
                        'id' => $patient->id
                    ];
                    return view('pages.admin.patient.action')->with('patient', $patient);
                })
                ->addColumn('gender', function($patient){
                    return $patient['gender'] == 'L' ? 'Laki-laki' : 'Perempuan';
                })
                ->addIndexColumn()
                ->rawColumns(['aksi', 'gender'])
                ->make(true);
        }
        return view('pages.admin.patient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $this->validate($request,
            [
                'nik' => 'required|unique:patients,nik'
            ],
            [
                'nik.required' => 'NIK tidak boleh kosong',
                'nik.unique' => 'NIK sudah terdaftar'
            ]
        );
        $patient = Patient::create($request->all());

        Alert::success('Success', 'Berhasil menambahkan data pasien');
        return redirect()->route('admin.patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('pages.admin.patient.edit')->with('patient', $patient);
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

        Alert::success('Success', 'Berhasil mengubah data pasien');
        return redirect()->route('admin.patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        Alert::success('Success', 'Berhasil menghapus data pasien');
        return redirect()->route('admin.patient.index');
    }
}
