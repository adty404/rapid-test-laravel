<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PatientRegister;
use RealRashid\SweetAlert\Facades\Alert;

class CreatePatientExistRegisterAction
{

    public function execute($patientRegisterRequest, $patient)
    {
        $patientRegister = new PatientRegister;
        $data_patient_register = $patientRegisterRequest->all();

        //define some patient register column
        $data_patient_register['patient_id'] = $patient->id;
        $data_patient_register['register_number'] = $this->generateRegisterNumber(strtoupper(Str::random(8)));
        $data_patient_register['status'] = PatientRegister::ACCEPTED;

        //formatting end date
        $start_date = Carbon::parse($data_patient_register['start_date'] . ' ' . $data_patient_register['start_time']);
        $data_patient_register['start_date'] = $start_date->toDateTimeString();
        $data_patient_register['end_date']   = $start_date->addMinutes(25)->toDateTimeString();

        // close hours
        $closed_hours = $patientRegister->closed_hours(Carbon::parse($data_patient_register['start_time'])->format('H'));

        if ($closed_hours) {
            return redirect()->route('patient.register', $patient->nik)->with('closed_hours', $closed_hours);
        }

        //is date exist?
        $is_date_exist = $patientRegister->is_date_exist($data_patient_register);

        if ($is_date_exist) {
            return redirect()->route('patient.register', $patient->nik)->with('data', $is_date_exist);
            // return view('pages.front.patient-register.index', ['data' => $is_date_exist]);
        } else {
            //create new patient register
            $patientRegister = PatientRegister::create($data_patient_register);

            Alert::success('Success', 'Pendaftaran Berhasil');
            return redirect()->route('patient-register.success', $patientRegister->register_number);
        }
    }

    public function generateRegisterNumber($data)
    {
        $register_number = 'P-' . $data;
        return $register_number;
    }
}
