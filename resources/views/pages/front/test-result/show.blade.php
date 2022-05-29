@extends('layouts.front')

@section('title', 'Hasil Rapid Test')

@push('header')
@include('includes.front.header.header-test-result')
@endpush

@section('content')
<!--=============== Start braeadcrum Area =================-->
<section class="faq_breadcrumb_area">
    <img class="overlay_bg" src="{{ asset('assets/images/about/worldmap2.png') }}" alt="" />
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h6>Klinik Mutiara</h6>
            <h2>Hasil Rapid Test</h2>
        </div>
    </div>
</section>
<!--================End braeadcrum Area =================-->
<!--================Start coronavirus question Area =================-->
<section class="coronavirus_question_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="common_question_item">
                    <h3>Hasil Rapid Test</h3>
                    <table>
                        <tr>
                            <td width="45%"><b>Nomor Pendaftaran</b></td>
                            <td width="10%"><b>:</b></td>
                            <td><b>{{ $data->register_number }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Nik</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->patient->nik }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Nama</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->patient->name }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Hasil</b></td>
                            <td><b>:</b></td>
                            <td>
                                @if ($data->testResult->result == 'positif')
                                <button type="button" class="btn btn-md btn-success"> <b>POSITIF</b> </button>
                                @else
                                <button type="button" class="btn btn-md btn-danger"> NEGATIF </button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Rujukan</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->testResultDetail->rujukan }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Penanggung Jawab</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->testResultDetail->penanggung_jawab }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Pemeriksa</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->testResultDetail->pemeriksa }}</b></td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ $data->testResultDetail->keterangan }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="common_question_item">
                    <h3>Hasil Rapid Test</h3>
                    <table>
                        <tr>
                            <td width="40%"><b>Nomor Pendaftaran</b></td>
                            <td width="10%"><b>:</b></td>
                            <td style="font-size: 20px">
                                <u>
                                    <b>{{ $data->register_number }}</b>
                                </u>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Hasil</b></td>
                            <td><b>:</b></td>
                            <td>
                                @if ($data->testResult->result == 'positif')
                                <button type="button" class="btn btn-md btn-success"> <b>POSITIF</b> </button>
                                @else
                                <button type="button" class="btn btn-md btn-danger"> NEGATIF </button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>SURAT HASIL</b></td>
                            <td><b>:</b></td>
                            <td>
                                <a href="{{ route('test-result.export', $data->testResult) }}" class="btn btn-md btn-info" target="_blank"><b>Cetak</b></a>
                            </td>
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
