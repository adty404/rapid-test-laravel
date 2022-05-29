<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestResult\CreateTestResultRequest;
use App\Http\Requests\TestResult\UpdateTestResultRequest;
use App\Models\Patient;
use App\Models\PatientRegister;
use App\Models\TestResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('pages.admin.test-result.index');
    }

    public function getdata()
    {
        $user = auth()->user();

        if ($user['role'] == 'admin') {
            $query = DB::table('test_results')
                ->join('patient_registers', 'test_results.patient_register_id', '=', 'patient_registers.id')
                ->join('patients', 'patient_registers.patient_id', '=', 'patients.id')
                ->join('test_result_detail', 'test_results.id', '=', 'test_result_detail.test_result_id')
                ->select('test_results.*', 'patients.*', 'patient_registers.register_number', 'patient_registers.patient_id', 'test_result_detail.rujukan', 'test_result_detail.penanggung_jawab', 'test_result_detail.pemeriksa', 'test_result_detail.keterangan')
                ->where('test_results.deleted_at', null);
        }

        return DataTables::of($query)
                ->addColumn('aksi', function ($test_result) {
                    $test_result = [
                        'id' => $test_result->id
                    ];
                    return view('pages.admin.test-result.action')->with('test_result', $test_result);
                })
                ->editColumn('updated_at', function ($test_result) {
                    return Carbon::parse($test_result->updated_at)->format('d M Y, H:i');
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
        return view('pages.admin.test-result.create', [
            'patient_register' => PatientRegister::doesntHave('testResult')->where('start_date', '<', now())->get('register_number')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTestResultRequest $request)
    {
        // is register number already tested on lab? checking start_date of test
        $patient_register = PatientRegister::whereRegisterNumber($request->register_number)->first();
        if($patient_register->start_date > now()){
            Alert::error('Error', 'Jadwal test akan dilakukan pada ' . Carbon::parse($patient_register->start_date)->format('d M Y'));
            return redirect()->route('admin.test-result.create');
        }

        $data = $request->validated();

        //is register number exist?
        $patient_register = PatientRegister::where('register_number', $data['register_number'])->first();

        if (!$patient_register) {
            Alert::error('Error', 'Nomor Pendaftaran tidak ditemukan');
            return redirect()->route('admin.test-result.create');
        }

        //is result issued?
        if ($patient_register->testResults) {
            Alert::error('Error', 'Nomor Pendaftaran tersebut sudah memiliki hasil test');
            return redirect()->route('admin.test-result.create');
        }

        //save test result
        $data['patient_register_id'] = $patient_register->id;
        $test_result = TestResult::create($data);

        //create test result detail
        $test_result->testResultDetail()->create($data);

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

        //test result update
        $data['patient_register_id'] = $test_result->patient_register_id;
        $test_result->update($data);

        //test result detail update
        $test_result->testResultDetail()->update([
            'rujukan' => $data['rujukan'],
            'penanggung_jawab' => $data['penanggung_jawab'],
            'pemeriksa' => $data['pemeriksa'],
            'keterangan' => $data['keterangan'],
        ]);

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

    public function export(TestResult $test_result)
    {
        return view('pages.admin.test-result.result', [
            'test_result' => $test_result,
            'file_name' =>  'hasil-lab-'.$test_result->patientRegister->register_number.''
        ]);
    }
}
