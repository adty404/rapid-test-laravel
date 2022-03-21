<?php

namespace App\Action;

use App\Http\Requests\Patient\PatientRequest;
use App\Models\Patient;

class CreatePatientAction{

    public string $patient_id;

    public function execute(PatientRequest $patientRequest){
        $data_patient = $patientRequest->all();

         //is patient exist?
         $patient = new Patient;
         $is_patient_exist = $patient->is_patient_exist($data_patient);

         //create new patient
         if ($is_patient_exist) {
             $patient_id = $is_patient_exist->id;
         }else{
             $patient = Patient::create($data_patient);
             $patient_id = $patient->id;
         }

         $this->patient_id = $patient_id;
    }

    public function getPatientId(){
        return $this->patient_id;
    }
}


