@extends('layouts.front')

@section('title', 'Cek Data Pendaftaran')

@push('header')
@include('includes.front.header.header-check-patient-register')
@endpush

@section('content')
<!--=============== Start braeadcrum Area =================-->
<section class="faq_breadcrumb_area">
    <img class="overlay_bg" src="assets/images/about/worldmap2.png" alt="" />
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h6>Klinik Mutiara</h6>
            <h2>Data Pendaftaran Rapid Test</h2>

            @include('pages.front.check-patient-register.errors.error-index')

            <form action="{{ route('check-patient-register.check') }}" method="POST" class="faq_search">
                @csrf
                <div class="control-with-icon">
                    <input type="text" name="register_number" class="form-control" placeholder="Silahkan masukkan nomor registrasi anda ..." required="" />
                    <span class="control-icon">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End braeadcrum Area =================-->
<!--================Starrt Work Area =================-->
<section class="work_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="work_content">
                    <div class="main_title">
                        <h2>Alur pendaftaran rapid test</h2>
                    </div>
                    <ol class="work_list">
                        <li class="wow fadeInUp" data-wow-delay="0.1s">Isi data anda pada form pendaftaran
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.2s">Tentukan tanggal dan jam untuk rapid test</li>
                        <li class="wow fadeInUp" data-wow-delay="0.3s">Sistem akan memvalidasi tanggal dan jam yang anda
                            isikan</li>
                        <li class="wow fadeInUp" data-wow-delay="0.4s">Pendaftaran berhasil, simpan nomor pendaftaran /
                            QR Code anda</li>
                        <li class="wow fadeInUp" data-wow-delay="0.5s">Datang ke klinik dan berikan nomor pendaftaran /
                            QR Code ke petugas</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img data-wow-delay="400ms" class="img-fluid wow fadeInRight" src="assets/images/appoinment/works.jpg"
                    alt="">
            </div>
        </div>
    </div>
</section>
<!--================End work Area =================-->

<!--================Client Logo Area =================-->
<section class="client_logo_area pad_top">

</section>
<!--================End Client Logo Area =================-->

@endsection

@push('addon-script')
<script src="assets/vendors/scroll-animation/parallax.js"></script>
<script src="assets/js/theme.js"></script>
@endpush
