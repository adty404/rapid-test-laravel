<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRegister extends Model
{
    use HasFactory;

    public const ACCEPTED = 'accepted';
    public const REJECTED = 'rejected';

    protected $fillable = [
        'patient_id',
        'register_number',
        'status',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function testResults()
    {
        return $this->hasOne(TestResult::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function is_date_exist($data_patient_register){
        $patientRegister = PatientRegister::query();
        return $patientRegister->where([
            ['start_date', '<=', $data_patient_register['start_date']],
            ['end_date', '>=', $data_patient_register['start_date']],
        ])->orWhere([
            ['start_date', '<=', $data_patient_register['end_date']],
            ['end_date', '>=', $data_patient_register['end_date']]
        ])->first();
    }
}
