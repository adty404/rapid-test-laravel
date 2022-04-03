<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestResult\CreateTestResultRequest;
use App\Http\Requests\TestResult\UpdateTestResultRequest;
use App\Models\PatientRegister;
use App\Models\TestResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use PDF;

class TestResultController extends Controller
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
            $query = TestResult::with(['patientRegister.patient']);
        }

        if (request()->ajax()) {

            return DataTables::of($query)
                ->addColumn('aksi', function ($test_result) {
                    $test_result = [
                        'id' => $test_result->id
                    ];
                    return view('pages.admin.test-result.action')->with('test_result', $test_result);
                })
                ->addColumn('register_number', function($test_result){
                    return $test_result->patientRegister['register_number'];
                })
                ->addColumn('nik', function($test_result){
                    return $test_result->patientRegister->patient['nik'];
                })
                ->addColumn('name', function($test_result){
                    return $test_result->patientRegister->patient['name'];
                })
                ->addColumn('updated_at', function($test_result){
                    return Carbon::parse($test_result->updated_at)->format('d M Y, H:i');
                })
                ->addIndexColumn()
                ->rawColumns(['aksi', 'register_number', 'nik', 'name', 'updated_at'])
                ->make(true);
        }
        return view('pages.admin.test-result.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.test-result.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTestResultRequest $request)
    {
        $data = $request->validated();

        //is register number exist?
        $patient_register = PatientRegister::where('register_number', $data['register_number'])->first();

        if (!$patient_register) {
            Alert::error('Error', 'Nomor Pendaftaran tidak ditemukan');
            return redirect()->route('admin.test-result.create');
        }

        //is result issued?
        if($patient_register->testResults){
            Alert::error('Error', 'Nomor Pendaftaran tersebut sudah memiliki hasil test');
            return redirect()->route('admin.test-result.create');
        }

        //save test result
        $data['patient_register_id'] = $patient_register->id;
        TestResult::create($data);

        Alert::success('Success', 'Hasil test berhasil ditambahkan');
        return redirect()->route('admin.test-result.index');
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
    public function edit(TestResult $test_result)
    {
        return view('pages.admin.test-result.edit')->with('test_result', $test_result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestResultRequest $request, TestResult $test_result)
    {
        $data = $request->validated();

        $data['patient_register_id'] = $test_result->patient_register_id;

        $test_result->update($data);

        Alert::success('Success', 'Hasil test berhasil diubah');
        return redirect()->route('admin.test-result.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestResult $test_result)
    {
        $test_result->delete();

        Alert::success('Success', 'Hasil test berhasil dihapus');
        return redirect()->route('admin.test-result.index');
    }

    public function export(CreateTestResultRequest $request)
    {
        $data = $request->validated();

        //is register number exist?
        $patient_register = PatientRegister::where('register_number', $data['register_number'])->first();

        if (!$patient_register) {
            Alert::error('Error', 'Nomor Pendaftaran tidak ditemukan');
            return redirect()->route('admin.test-result.index');
        }

        //is result issued?
        if($patient_register->testResults){
            Alert::error('Error', 'Hasil pemeriksaan sudah dicetak');
            return redirect()->route('admin.test-result.index');
        }

        //save test result
        $data['patient_register_id'] = $patient_register->id;
        TestResult::create($data);

        //export with dom pdf
        $pdf = PDF::loadView('pages.admin.test-result.result', [
            'patient_register' => PatientRegister::with(['patient', 'testResults'])->where('register_number', $data['register_number'])->first(),
        ]);
        return $pdf->stream();
        // return $pdf->download('hasil-rapid-test-'.$data['register_number'].'.pdf');
    }
}
