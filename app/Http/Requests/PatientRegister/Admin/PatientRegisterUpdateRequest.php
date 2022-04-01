<?php

namespace App\Http\Requests\PatientRegister\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PatientRegisterUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_id' => ['required', 'numeric'],
            'start_date' => ['required'],
            'start_time' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'patient_id.required' => 'NIK harus diisi',
            'patient_id.numeric' => 'NIK harus berupa angka',
            'start_date.required' => 'Tanggal harus diisi',
            'start_time.required' => 'Waktu harus diisi'
        ];
    }
}
