<?php

namespace App\Http\Requests\TestResult;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTestResultRequest extends FormRequest
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
            'register_number' => ['required', 'exists:patient_registers,register_number', 'unique:patient_registers,register_number,' . $this->test_result->patient_register_id],
            'result' => ['required', 'in:positif,negatif'],
            'rujukan' => ['nullable'],
            'penanggung_jawab' => ['required'],
            'pemeriksa' => ['required'],
            'keterangan' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'register_number.required' => 'Nomor Pendaftaran harus diisi',
            'register_number.exists' => 'Nomor Pendaftaran tidak ditemukan',
            'register_number.unique' => 'Nomor Pendaftaran sudah terdaftar',
            'result.required' => 'Hasil Rapid Test harus diisi',
            'result.in' => 'Hasil Rapid Test harus positif atau negatif',
            'penanggung_jawab.required' => 'Penanggung Jawab harus diisi',
            'pemeriksa.required' => 'Pemeriksa harus diisi',
        ];
    }
}
