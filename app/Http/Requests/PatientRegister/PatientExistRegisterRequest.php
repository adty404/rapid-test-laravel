<?php

namespace App\Http\Requests\PatientRegister;

use Illuminate\Foundation\Http\FormRequest;

class PatientExistRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'nik' => ['required', 'numeric', 'digits:16'],
            'start_date' => ['required'],
            'start_time' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'NIK harus diisi',
            'nik.numeric' => 'NIK harus berupa angka',
            'nik.digits' => 'NIK harus berjumlah 16 digit',
            'start_date.required' => 'Tanggal harus diisi',
            'start_time.required' => 'Waktu harus diisi'
        ];
    }
}
