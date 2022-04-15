<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_register_id',
        'result',
    ];

    public function patientRegister()
    {
        return $this->belongsTo(PatientRegister::class);
    }

    public function testResultDetail()
    {
        return $this->hasOne(TestResultDetail::class);
    }
}
