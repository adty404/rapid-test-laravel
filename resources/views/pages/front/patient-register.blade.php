@extends('layouts.front')

@section('title', 'Pendaftaran Rapid Test')

@section('content')
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
        <div class="row appointment_box">
            <div class="col-lg-4 appoinment_features">
                <div class="shape one" data-parallax='{"y": 100}'>
                    <img src="assets/images/appoinment/a_img1.png" alt="" />
                </div>
                <div class="shape two">
                    <img src="assets/images/appoinment/a_img2.png" alt="" />
                </div>
                <div class="shape three">
                    <img src="assets/images/appoinment/a_img3.png" alt="" />
                </div>
                <div class="shape four" data-parallax='{"x": 30}'>
                    <img src="assets/images/appoinment/a_img4.png" alt="" />
                </div>
                <div class="shape five">
                    <img src="assets/images/appoinment/a_img5.png" alt="" />
                </div>
                <div class="shape six" data-parallax='{"y": 50}'>
                    <img src="assets/images/appoinment/a_img6.png" alt="" />
                </div>
                <h2>Form Pendaftaran Rapid Test</h2>
                <p>
                    Isi form pendaftaran berikut untuk melakukan pendaftaran rapid test
                </p>
            </div>
            <div class="col-lg-8">
                <form action="#" class="appoinment_form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="name" name="name" placeholder="" />
                                <label><i class="lnr lnr-user"></i>Nama</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control" type="text" id="birth_place" name="birth_place" placeholder="" />
                                <label><i class="lnr lnr-map-marker"></i>Tempat Lahir</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group date" id="datetimepicker3" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker3"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text">
                                        <i class="lnr lnr-calendar-full"></i>
                                    </div>
                                </div>
                                <div class="text_div">
                                    Tanggal Lahir
                                </div>
                                <input type="text" name="birth_date" class="form-control datetimepicker-input"
                                    data-target="#datetimepicker3" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group date" id="datetimepicker5" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker5"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text">
                                        <i class="lnr lnr-calendar-full"></i>
                                    </div>
                                </div>
                                <div class="text_div">
                                    Tanggal Rapid Test
                                </div>
                                <input type="text" name="start_date" class="form-control datetimepicker-input"
                                    data-target="#datetimepicker5" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group date" id="datetimepicker4" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker4"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text">
                                        <i class="lnr lnr-clock"></i>
                                    </div>
                                </div>
                                <div class="text_div">
                                    Jam Rapid Test
                                </div>
                                <input type="text" name="start_time" class="form-control datetimepicker-input"
                                    data-target="#datetimepicker4" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="address" id="address" cols="30" rows="10"
                                    class="form-control"></textarea>
                                <label><i class="lnr lnr-home"></i>Alamat</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group checkbox_field">
                                <button type="submit" class="green_btn" value="appoinment" data-value="appoinment">
                                    Submit
                                </button>
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
                        <li class="wow fadeInUp" data-wow-delay="0.1s">Isi data anda pada form di atas
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.2s">Tentukan tanggal dan jam untuk rapid test</li>
                        <li class="wow fadeInUp" data-wow-delay="0.3s">Sistem akan memvalidasi tanggal dan jam yang anda isikan</li>
                        <li class="wow fadeInUp" data-wow-delay="0.4s">Pendaftaran berhasil, simpan nomor pendaftaran / QR Code anda</li>
                        <li class="wow fadeInUp" data-wow-delay="0.5s">Datang ke klinik dan berikan nomor pendaftaran / QR Code ke petugas</li>
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

<!--================Check Now Area =================-->
<section class="check_now_area check_now_box full_widget_check">
    <div class="container">
        <div class="row m-0 justify-content-between">
            <div class="left">
                <div class="media">
                    <div class="d-flex">
                        <img src="assets/images/check-4.png" alt="" />
                        <img src="assets/images/check-5.png" alt="" />
                        <img src="assets/images/check-6.png" alt="" />
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
                <a class="icon_btn" href="#">Daftar <i class="lnr lnr-arrow-top"></i></a>
            </div>
        </div>
    </div>
</section>
<!--================End Check Now Area =================-->
@endsection

@push('modal')
<div class="modal fade search_modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="assets/images/icon/close-white.png" alt="">
    </button>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type here..."
                        aria-label="Recipient's username">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i
                                class="lnr lnr-magnifier"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush
