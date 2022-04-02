@extends('layouts.front')

@section('title', 'Pendaftaran Rapid Test')

@push('addon-style')
<link rel="stylesheet" href="{{ asset('assets/vendors/datetimepicker/tempusdominus-bootstrap-4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/animate-css/animate.css') }}" />
@endpush

@push('header')
@include('includes.front.header.header-patient-register')
@endpush

@section('content')
@include('sweetalert::alert')
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area boi_breadcrumb">
    <div class="container">
        <div class="breadcrumb_text">
            <h6 class="wow fadeInUp">Klinik Mutiara</h6>
            <h3 class="wow fadeInUp" data-wow-delay="0.2s">Pendaftaran Rapid Test</h3>
            <ul class="nav justify-content-center wow fadeInUp" data-wow-delay="0.3s">
                <li><a href="#">Form Pendaftaran</a></li>
            </ul>
        </div>
        <div class="row appointment_box pad-top">
            <div class="col-lg-4 appoinment_features">
                <div class="shape one" data-parallax='{"y": 100}'>
                    <img src="{{ asset('assets/images/appoinment/a_img1.png') }}" alt="" />
                </div>
                <div class="shape two">
                    <img src="{{ asset('assets/images/appoinment/a_img2.png') }}" alt="" />
                </div>
                <div class="shape three">
                    <img src="{{ asset('assets/images/appoinment/a_img3.png') }}" alt="" />
                </div>
                <div class="shape four" data-parallax='{"x": 30}'>
                    <img src="{{ asset('assets/images/appoinment/a_img4.png') }}" alt="" />
                </div>
                <div class="shape five">
                    <img src="{{ asset('assets/images/appoinment/a_img5.png') }}" alt="" />
                </div>
                <div class="shape six" data-parallax='{"y": 50}'>
                    <img src="{{ asset('assets/images/appoinment/a_img6.png') }}" alt="" />
                </div>
                <h2>Form Pendaftaran Rapid Test</h2>
                <p>
                    Isi form pendaftaran berikut untuk melakukan pendaftaran rapid test
                </p>
            </div>
            <div class="col-lg-8">
                @include('pages.front.patient.errors.error-edit')
                <form action="{{ route('patient.update', $patient) }}" method="POST" enctype="multipart/form-data" class="appoinment_form">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control @error('nik') is-invalid @else is-valid @enderror" type="number" id="nik" name="nik" value="{{ $patient->nik ?? old('nik') }}" @if ($errors->any()) placeholder="{{ $patient->nik ?? old('nik') }}"
                                @endif required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control @error('name') is-invalid @else is-valid @enderror" type="text" id="name" name="name" value="{{ $patient->name ?? old('name') }}" @if ($errors->any()) placeholder="{{ $patient->name ?? old('name') }}"
                                @endif required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control @error('gender') is-invalid @else is-valid @enderror" name="gender" id="gender">
                                    <option value=""></option>
                                    <option value="L" {{ $patient->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $patient->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control @error('phone') is-invalid @else is-valid @enderror" type="number" id="phone" name="phone" value="{{ $patient->phone ?? old('phone') }}" @if ($errors->any()) placeholder="{{ $patient->phone ?? old('phone') }}"
                                @endif required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control @error('birth_place') is-invalid @else is-valid @enderror" type="text" id="birth_place" name="birth_place"
                                    value="{{ $patient->birth_place ?? old('birth_place') }}" @if ($errors->any()) placeholder="{{ $patient->birth_place ?? old('birth_place') }}"
                                    @endif required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group date" id="datetimepicker_ttl"
                                data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker_ttl"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </div>
                                </div>
                                @if ($errors->has('birth_date'))
                                <div class="text_div">
                                    Tanggal Lahir
                                </div>
                                @endif

                                <input type="text" name="birth_date" value="{{ $patient->birth_date ?? old('birth_date') }}" class="form-control @error('birth_date') is-invalid @else is-valid @enderror datetimepicker-input"
                                    data-target="#datetimepicker_ttl" data-toggle="datetimepicker" @error('birth_date')
                                    placeholder="Tanggal Lahir" @enderror required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('address') is-invalid @else is-valid @enderror"
                                    required>{{ $patient->address ?? old('address') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group checkbox_field">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-warning">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Breadcrumb Area =================-->

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
                <img data-wow-delay="400ms" class="img-fluid wow fadeInRight"
                    src="{{ asset('assets/images/appoinment/works.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!--================End work Area =================-->

<!--================Client Logo Area =================-->
<section class="client_logo_area pad_top">

</section>
<!--================End Client Logo Area =================-->

<!--================Check Now Area =================-->
<section class="check_now_area check_now_box full_widget_check">
    <div class="container">
        <div class="row m-0 justify-content-between">
            <div class="left">
                <div class="media">
                    <div class="d-flex">
                        <img src="{{ asset('assets/images/check-4.png') }}" alt="" />
                        <img src="{{ asset('assets/images/check-5.png') }}" alt="" />
                        <img src="{{ asset('assets/images/check-6.png') }}" alt="" />
                    </div>
                    <div class="media-body">
                        <h4>Apakah anda terpapar virus corona?</h4>
                        <p>
                            Lakukan rapid test agar anda mengetahui hasilnya!
                        </p>
                    </div>
                </div>
            </div>
            <div class="right">
                <a class="icon_btn" href="#">Daftar <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!--================End Check Now Area =================-->
@endsection

@push('addon-script')
<script src="{{ asset('assets/vendors/datetimepicker/moment.js') }}"></script>
<script src="{{ asset('assets/vendors/datetimepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assets/vendors/animate-css/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
@endpush
