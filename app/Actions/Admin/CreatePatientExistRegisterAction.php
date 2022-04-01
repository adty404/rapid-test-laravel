<?php

namespace App\Actions\Admin;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PatientRegister;
use RealRashid\SweetAlert\Facades\Alert;

class CreatePatientExistRegisterAction
{

    public function execute($patientRegisterRequest)
    {
        $patientRegister = new PatientRegister;
        $data_patient_register = $patientRegisterRequest->all();

        //define some patient register column
        $data_patient_register['patient_id'] = $data_patient_register['patient_id'];
        $data_patient_register['register_number'] = $this->generateRegisterNumber(strtoupper(Str::random(8)));
        $data_patient_register['status'] = PatientRegister::ACCEPTED;

        //formatting end date
        $start_date = Carbon::parse($data_patient_register['start_date'] . ' ' . $data_patient_register['start_time']);
        $data_patient_register['start_date'] = $start_date->toDateTimeString();
        $data_patient_register['end_date']   = $start_date->addMinutes(25)->toDateTimeString();

        // close hours
        $closed_hours = $patientRegister->closed_hours(Carbon::parse($data_patient_register['start_time'])->format('H'));

        if ($closed_hours) {
            return view('pages.admin.patient-register.create', [
                'closed_hours' => $closed_hours,
                'patient' => Patient::all('id', 'nik'),
            ]);
        }

        //is date exist?
        $is_date_exist = $patientRegister->is_date_exist($data_patient_register);

        if ($is_date_exist) {
            return view('pages.admin.patient-register.create', [
                'data' => $is_date_exist,
                'patient' => Patient::all('id', 'nik'),
            ]);
        } else {
            //create new patient register
            $patientRegister = PatientRegister::create($data_patient_register);

            Alert::success('Success', 'Pendaftaran Berhasil');
            return redirect()->route('admin.register-patient.index');
        }
    }

    public function generateRegisterNumber($data)
    {
        $register_number = 'P-' . $data;
        return $register_number;
    }
}
