@extends('layouts.front')

@section('title', 'Status Pendaftaran')

@push('header')
@include('includes.front.header.header-status')
@endpush

@section('content')
<!--=============== Start braeadcrum Area =================-->
<section class="faq_breadcrumb_area">
    <img class="overlay_bg" src="assets/images/about/worldmap2.png" alt="" />
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h6>Klinik Mutiara</h6>
            <h2>Status Pendaftaran Rapid Test</h2>
            <form action="#" class="faq_search">
                <div class="control-with-icon">
                    <input type="text" class="form-control" placeholder="Silahkan masukkan nomor registrasi anda ..." required="" />
                    <span class="control-icon"><i class="fa fa-search"></i></span>
                </div>
            </form>
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
            <div class="col-lg-4 col-md-6 col-sm-12 col-6">
                <a href="#" class="corona_question">
                    <div class="icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    Diterima
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-6">
                <a href="#" class="corona_question_failed">
                    <div class="icon-failed">
                        <i class="fa fa-times-circle"></i>
                    </div>
                    Ditolak
                </a>
            </div>
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
                            <td>Nik</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Nomor HP</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="common_question_item">
                    <h3>Jadwal Rapid Test dan QR Code</h3>
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>QR Code</td>
                            <td>:</td>
                            <td></td>
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
<script src="assets/vendors/scroll-animation/parallax.js"></script>
<script src="assets/js/theme.js"></script>
@endpush
