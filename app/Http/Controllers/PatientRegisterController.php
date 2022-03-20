<?php

namespace App\Http\Controllers;

use App\Models\PatientRegister;
use Illuminate\Http\Request;

class PatientRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $checkBooking = PatientRegister::where('start_date', '<=', $request->start_date)
                                    ->where('end_date', '>=', $request->start_date)
                                    ->first();


        // $waktuMulai = WaktuMulai::all();
        // foreach($waktuMulai as $wm){
        //     $waktuMulaiMDY = $wm['m_d_y'];
        //     $waktuMulaiJAM = $wm['jam'];
        // }

        // $waktuTampil = WaktuTampil::all();
        // foreach($waktuTampil as $wt){
        //     $waktuTampilMDY = $wt['m_d_y'];
        //     $waktuTampilJAM = $wt['jam'];
        // }

        // $data_waktu_mulai  = date("$waktuMulaiMDY $waktuMulaiJAM");
        // $data_waktu_tampil = date("$waktuTampilMDY $waktuTampilJAM");
        // $now               = date("m/d/Y G:i");
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
