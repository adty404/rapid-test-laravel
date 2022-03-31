<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'nik' => ['required', 'numeric', 'digits:16', 'unique:patients,nik,' . $this->patient->id],
            'name' => ['required'],
            'gender' => ['required', 'in:L,P'],
            'phone' => ['required', 'numeric', 'digits_between:12,13', 'unique:patients,phone,' . $this->patient->id],
            'birth_place' => ['required'],
            'birth_date' => ['required', 'before:today'],
            'address' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'NIK harus diisi',
            'nik.numeric' => 'NIK harus berupa angka',
            'nik.digits' => 'NIK harus berjumlah 16 digit',
            'nik.unique' => 'NIK sudah terdaftar',
            'name.required' => 'Nama harus diisi',
            'gender.required' => 'Jenis Kelamin harus diisi',
            'gender.in' => 'Jenis Kelamin harus Laki-laki atau Perempuan',
            'phone.required' => 'Nomor HP harus diisi',
            'phone.numeric' => 'Nomor HP harus berupa angka',
            'phone.digits_between' => 'Nomor HP minimal 12 digit dan maksimal 13 digit',
            'phone.unique' => 'Nomor HP sudah terdaftar',
            'birth_place.required' => 'Tempat lahir harus diisi',
            'birth_date.required' => 'Tanggal lahir harus diisi',
            'birth_date.before' => 'Tanggal lahir harus kurang dari tanggal hari ini',
            'address.required' => 'Alamat harus diisi',
        ];
    }
}
