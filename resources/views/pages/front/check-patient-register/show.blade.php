@extends('layouts.front')

@section('title', 'Cek Data Pendaftaran')

@push('header')
@include('includes.front.header.header-check-patient-register')
@endpush

@section('content')
<!--=============== Start braeadcrum Area =================-->
<section class="faq_breadcrumb_area">
    <img class="overlay_bg" src="{{ asset('assets/images/about/worldmap2.png') }}" alt="" />
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h6>Klinik Mutiara</h6>
            <h2>Data Pendaftaran Rapid Test</h2>
        </div>
    </div>
</section>
<!--================End braeadcrum Area =================-->
<!--================Start coronavirus question Area =================-->
<section class="coronavirus_question_area">
    <div class="container">
        <div class="main_title text-center">
            <h2>Status Registrasi</h2>
        </div>
        <div class="row">
            @if ($data->status == 'accepted')
            <div class="col-lg-4 col-md-6 col-sm-12 col-6">
                <a href="#" class="corona_question">
                    <div class="icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    Diterima
                </a>
            </div>
            @elseif ($data->status == 'rejected')
                <div class="col-lg-4 col-md-6 col-sm-12 col-6">
                    <a href="#" class="corona_question">
                        <div class="icon">
                            <i class="fa fa-times-circle"></i>
                        </div>
                        Ditolak
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
<section class="common_question_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="common_question_item">
                    <h3>Data Registrasi</h3>
                    <table>
                        <tr>
                            <td width="45%"><b>Nik</b></td>
                            <td width="10%"><b>:</b></td>
                            <td><b>{{ $data->patient->nik }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Nama</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->patient->name }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->patient->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Nomor HP</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->patient->phone }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Tempat Lahir</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->patient->birth_place }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Lahir</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->patient->birth_date }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->patient->address }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Waktu Pendaftaran</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->created_at->format('Y-m-d') }}, jam {{ $data->created_at->format('H:i:s') }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="common_question_item">
                    <h3>Jadwal Rapid Test dan QR Code</h3>
                    <table>
                        <tr>
                            <td width="45%"><b>Tanggal</b></td>
                            <td width="10%"><b>:</b></td>
                            <td><b>{{ $data->start_date->format('Y-m-d') }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Jam</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->start_date->format('H:i:s') }} s.d {{ $data->end_date->format('H:i:s') }}</b></td>
                        </tr>
                        <tr>
                            <td><b>QR Code</b></td>
                            <td><b>:</b></td>
                            <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($link)) !!} "></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End coronavirus question Area =================-->

<!--================Client Logo Area =================-->
<section class="client_logo_area pad_top">

</section>
<!--================End Client Logo Area =================-->

@endsection

@push('addon-script')
<script src="{{ asset('assets/vendors/scroll-animation/parallax.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
@endpush
