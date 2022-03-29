@extends('layouts.front')

@section('title', 'Sukses Mendaftar')

@push('header')
@include('includes.front.header.header-check-patient-register')
@endpush

@section('content')
@include('sweetalert::alert')
<!--=============== Start braeadcrum Area =================-->
<section class="faq_breadcrumb_area">
    <img class="overlay_bg" src="{{ asset('assets/images/about/worldmap2.png') }}" alt="" />
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h6>Klinik Mutiara</h6>
            <h2>Pendaftaran Rapid Test</h2>
        </div>
    </div>
</section>
<!--================End braeadcrum Area =================-->
<!--================Start coronavirus question Area =================-->
<section class="common_question_area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-success" style="margin-top: 20px">
                    <h5>
                        <i class="fa fa-check"></i> Success !!
                    </h5>
                    <ul>
                        <li>Pendaftaran berhasil, mohon untuk menyimpan nomor pendaftaran anda :
                            <b>{{ $data->register_number }}</b>
                        </li>
                        <li>
                            Silahkan datang ke klinik sesuai dengan jadwal anda dan berikan nomor pendaftaran anda kepada petugas klinik sebagai bukti pendaftaran
                        </li>
                        <li>
                            Anda bisa melakukan pengecekan data pendaftaran dengan memasukkan nomor pendaftaran pada
                            <b>
                                <a href="{{ route('check-patient-register.index') }}" style="color: green" target="_blank">
                                    Halaman Cek Data Pendaftaran
                                </a>
                            </b>
                        </li>
                    </ul>
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
