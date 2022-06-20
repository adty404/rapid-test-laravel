<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PatientRegister;
use App\Models\TestResult;

class TestResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.front.test-result.index');
    }

    public function check(Request $request)
    {
        $this->validate($request, [
            'register_number' => 'required|string|max:255',
        ]);

        $test_result = PatientRegister::whereRegisterNumber($request->register_number)->first();

        if ($test_result) {
            if($test_result->testResult()->exists()){
                return redirect()->route('test-result.show', $request->register_number);
            }
            return redirect()->route('test-result.index')->with('data', 'Hasil belum tersedia!');;
        }

        return redirect()->route('test-result.index')->with('data', 'Nomor Registrasi tidak ditemukan!');
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
    public function show($registerNumber)
    {
        $test_result = PatientRegister::with(['patient', 'testResult', 'testResultDetail'])->whereRegisterNumber($registerNumber)->first();
        if (!$test_result) {
            return redirect()->route('test-result.index')->with('data', 'Nomor Registrasi tidak ditemukan!');
        }

        return view('pages.front.test-result.show', [
            'data' => $test_result,
            'link' => route('test-result.show', $test_result->register_number),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function export(TestResult $test_result)
    {
        return view('pages.front.test-result.result', [
            'test_result' => $test_result,
            'file_name' =>  'hasil-lab-'.$test_result->patientRegister->register_number.''
        ]);
    }
}
