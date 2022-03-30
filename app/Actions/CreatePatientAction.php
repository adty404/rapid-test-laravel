<?php

namespace App\Actions;

use App\Http\Requests\Patient\PatientRequest;
use App\Models\Patient;

class CreatePatientAction
{

    public string $patient_id;

    public function execute(PatientRequest $patientRequest)
    {
        $data_patient = $patientRequest->all();

        $patient = Patient::create($data_patient);
        $patient_id = $patient->id;

        $this->patient_id = $patient_id;
    }

    public function getPatientId()
    {
        return $this->patient_id;
    }
}
