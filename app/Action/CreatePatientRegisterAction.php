<?php

namespace App\Action;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PatientRegister;

class CreatePatientRegisterAction{

    public function execute($patientRegisterRequest, $actionPatient){
        $data_patient_register = $patientRegisterRequest->all();

        //define some patient register column
        $data_patient_register['patient_id'] = $actionPatient->getPatientId();
        $data_patient_register['register_number'] = $this->generateRegisterNumber(strtolower(Str::random(8)));
        $data_patient_register['status'] = PatientRegister::ACCEPTED;

        //formatting end date
        $start_date = Carbon::parse($data_patient_register['start_date'] . ' ' . $data_patient_register['start_time']);
        $data_patient_register['start_date'] = $start_date->toDateTimeString();
        $data_patient_register['end_date']   = $start_date->addMinutes(25)->toDateTimeString();

        //is date exist?
        $patientRegister = new PatientRegister;
        $is_date_exist = $patientRegister->is_date_exist($data_patient_register);

        if($is_date_exist){
            echo "Date exist";
        }else{
            //create new patient register
            $patientRegister = PatientRegister::create($data_patient_register);
            dd($patientRegister);
        }

    }

    public function generateRegisterNumber($data)
    {
        $register_number = 'PST-' . $data;
        return $register_number;
    }
}
