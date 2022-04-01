<?php

namespace App\Actions\Admin;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PatientRegister;
use RealRashid\SweetAlert\Facades\Alert;

class UpdatePatientRegisterAction
{
    public function execute($request, $register_patient)
    {
        $data_patient_register = $request->all();
        $patientRegister = new PatientRegister;

        //define some patient register column
        $data_patient_register['patient_id'] = $data_patient_register['patient_id'];
        $data_patient_register['register_number'] = $register_patient->register_number;
        $data_patient_register['status'] = PatientRegister::ACCEPTED;

        //formatting end date
        $start_date = Carbon::parse($data_patient_register['start_date'] . ' ' . $data_patient_register['start_time']);
        $data_patient_register['start_date'] = $start_date->toDateTimeString();
        $data_patient_register['end_date']   = $start_date->addMinutes(25)->toDateTimeString();

        // close hours
        $closed_hours = $patientRegister->closed_hours(Carbon::parse($data_patient_register['start_time'])->format('H'));
        
        if ($closed_hours) {
            return view('pages.admin.patient-register.edit', [
                'closed_hours' => $closed_hours,
                'patient' => Patient::all('id', 'nik'),
                'register_patient' => $register_patient
            ]);
        }

        //is date exist?
        $is_date_exist = $patientRegister->is_date_exist($data_patient_register);

        if ($is_date_exist && $is_date_exist->id != $register_patient->id) {
            return view('pages.admin.patient-register.edit', [
                'data' => $is_date_exist,
                'patient' => Patient::all('id', 'nik'),
                'register_patient' => $register_patient
            ]);
        } else {
            $register_patient->update($data_patient_register);

            Alert::success('Success', 'Berhasil mengubah data pendaftaran');
            return redirect()->route('admin.register-patient.index');
        }
    }
}

