<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientRegister extends Model
{
    use HasFactory, SoftDeletes;

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

    public function testResult()
    {
        return $this->hasOne(TestResult::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function closed_hours($hour)
    {
        $closed_hours = [00, 01, 02, 03, 04, 05, 06, 07, 13, 14, 15, 20, 21, 22, 23, 24];
        $closed_hours2 = ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "13:00", "14:00", "15:00", "20:00", "21:00", "22:00", "23:00", "24:00"];

        if (in_array($hour, $closed_hours)) {
            return $closed_hours2;
        }
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
