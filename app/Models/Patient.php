<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'gender',
        'phone',
        'birth_place',
        'birth_date',
        'address',
    ];

    public function patientRegisters()
    {
        return $this->hasMany(PatientRegister::class);
    }

    public function is_patient_exist($data_patient)
    {
        return $this->where('nik', $data_patient['nik'])->first();
    }
}
