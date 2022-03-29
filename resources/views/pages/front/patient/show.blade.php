@extends('layouts.front')

@section('title', 'Data Pasien')

@push('header')
@include('includes.front.header.header-patient')
@endpush

@section('content')
<!--=============== Start braeadcrum Area =================-->
<section class="faq_breadcrumb_area">
    <img class="overlay_bg" src="{{ asset('assets/images/about/worldmap2.png') }}" alt="" />
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h6>Klinik Mutiara</h6>
            <h2>Data Pasien</h2>
        </div>
    </div>
</section>
<!--================End braeadcrum Area =================-->
<!--================Start coronavirus question Area =================-->
<section class="common_question_area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-warning" style="margin-top: 20px">
                    <h5>
                        <i class="fa fa-exclamation-triangle"></i> Perhatian !!
                    </h5>
                    <ul>
                        <li>
                            <b>
                                Anda pernah mendaftar sebelumnya dengan data sebagai berikut :
                            </b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End coronavirus question Area =================-->
<!--================Start coronavirus question Area =================-->
<section class="coronavirus_question_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="common_question_item">
                    <h3>Data Pasien</h3>
                    <table>
                        <tr>
                            <td width="45%"><b>Nik</b></td>
                            <td width="10%"><b>:</b></td>
                            <td><b>{{ $patient->nik }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Nama</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $patient->name }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $patient->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Nomor HP</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $patient->phone }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Tempat Lahir</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $patient->birth_place }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Lahir</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $patient->birth_date }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $patient->address }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Waktu Pendaftaran terakhir</b></td>
                            <td><b>:</b></td>
                            <td><b>
                                <form action="{{ route('check-patient-register.check') }}" method="POST" target="_blank">
                                    {{ $patientRegister->created_at->format('Y-m-d') }}, jam
                                    {{ $patientRegister->created_at->format('H:i:s') }}, <br /> nomor pendaftaran :
                                    @csrf
                                    <input type="hidden" name="register_number" value="{{ $patientRegister->register_number }}">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ $patientRegister->register_number }}</button>
                                </form>
                                </b>
                            </td>
                        </tr>
                    </table>

                    <hr />

                    <div class="protect_self_text" style="padding-top: 2%">
                        <h6>Apakah data sudah sesuai ?</h6>
                        <a href="{{ route('patient.register', $patient->nik) }}" class="btn btn-success">
                            Lanjut Mendaftar
                        </a>
                        <a href="{{ route('patient.edit', $patient->nik) }}" class="btn btn-danger">
                            Ubah Data
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================End coronavirus question Area =================-->
@endsection

@push('addon-script')
<script src="{{ asset('assets/vendors/scroll-animation/parallax.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
@endpush
