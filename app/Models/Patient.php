<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_place',
        'birth_day',
        'address',
    ];

    public function patientRegisters()
    {
        return $this->hasMany(PatientRegister::class);
    }
}
