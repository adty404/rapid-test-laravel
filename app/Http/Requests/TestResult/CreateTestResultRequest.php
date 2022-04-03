<?php

namespace App\Http\Requests\TestResult;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestResultRequest extends FormRequest
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
            'register_number' => ['required', 'exists:patient_registers,register_number'],
            'result' => ['required', 'in:positif,negatif'],
        ];
    }

    public function messages()
    {
        return [
            'register_number.required' => 'Nomor Pendaftaran harus diisi',
            'register_number.exists' => 'Nomor Pendaftaran tidak ditemukan',
            'result.required' => 'Hasil Rapid Test harus diisi',
            'result.in' => 'Hasil Rapid Test harus positif atau negatif',
        ];
    }
}
