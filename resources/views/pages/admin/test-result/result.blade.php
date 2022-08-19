<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <style>
        @page {
            size: A4 portrait;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                -moz-print-color-adjust: exact;
                -ms-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        .header img {
            float: right;
            width: 100px;
            height: 100px;
            margin-top: 10px;
            background: #555;
        }

        .header h2 {
            position: relative;
            margin-top: 25px;
            top: 18px;
            text-align: center;
        }
    </style>

    <title>{{ $file_name }}</title>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="card">
            <div class="header">
                <img src="{{ asset('assets/images/logo-klinik-mutiara.jpg') }}" style="margin-right: 10px" alt="logo" />
                <h2>MUTIARA - Laboratorium Klinik</h2>
            </div>
            <hr />
            <h4>
                <center class="mb-2"><u> HASIL PEMERIKSAAN LAB</u></center>
            </h4>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <table class="table table-borderless">
                            <tr>
                                <td width="35%">No Lab</td>
                                <td width="10%">:</td>
                                <td>220188200</td>
                            </tr>
                            <tr>
                                <td>ID Pasien</td>
                                <td>:</td>
                                <td>919</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $test_result->patientRegister->patient->name }}</td>
                            </tr>
                            <tr>
                                <td>Usia</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::now()->format('Y') -
                                    \Carbon\Carbon::parse($test_result->patientRegister->patient->birth_date)->format('Y')
                                    .
                                    ' Tahun' }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    {{ $test_result->patientRegister->patient->address }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-borderless">
                            <tr>
                                <td width="35%">Tanggal</td>
                                <td width="10%">:</td>
                                {{-- <td>Jum'at, 12 Februari 2021</td> --}}
                                <td>{{
                                    \Carbon\Carbon::parse($test_result->patientRegister->start_date)->isoFormat('dddd, D
                                    MMMM Y') }}</td>
                            </tr>
                            <tr>
                                <td>Rujukan</td>
                                <td>:</td>
                                <td>{{ $test_result->testResultDetail->rujukan }}</td>
                            </tr>
                            <tr>
                                <td>Telpon</td>
                                <td>:</td>
                                <td>{{ $test_result->patientRegister->patient->phone }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ $test_result->patientRegister->patient->gender === 'L' ? 'Laki-laki' :
                                    'Perempuan' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <hr />
            <p style="padding-left: 50%;">
                Tanggal Selesai : {{ \Carbon\Carbon::parse($test_result->patientRegister->start_date)->isoFormat('D MMMM
                Y')
                . ' / ' . \Carbon\Carbon::parse($test_result->patientRegister->end_date)->format('H:i:s') }}
            </p>
            <div class="products p-2">
                <table class="table">
                    <tr class="text-center" style="border: 20px;">
                        <td><b>Pemeriksaan</b></td>
                        <td><b>Hasil</b></td>
                        <td><b>Nilai Normal</b></td>
                        <td><b>Keterangan</b></td>
                    </tr>
                    <tr class="text-center">
                        <td>Antigen Covid</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="table-active text-center" style="border: 20px;">
                        <td><b>Antigen SARS CoV2</b></td>
                        <td><b>{{ $test_result->result === 'positif' ? 'POSITIF' : 'NEGATIF' }}</b></td>
                        <td><b>{{ $test_result->result === 'positif' ? 'POSITIF' : 'NEGATIF' }}</b></td>
                        <td class="text-center">{{ $test_result->testResultDetail->keterangan }}</td>
                    </tr>
                </table>
            </div>

            <div class="products p-2">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <table class="table" style="margin-top: 150px;">
                                <tr style="border: 20px;">
                                    <td class="text-center">{{ $test_result->testResultDetail->penanggung_jawab }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Penanggung Jawab</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <table class="table" style="margin-top: 150px;">
                                <tr style="border: 20px;">
                                    <td class="text-center">{{ $test_result->testResultDetail->pemeriksa }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Pemeriksa</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <table class="table table-borderless">
                <tbody style="color: #0ec90edb;">
                    <tr>
                        <td class="text-center" style="font-size: 15px; line-height:1px">
                            <b>
                                Metland Tambun Jl.Kalimaya VI Blok L2 No. 1 - Tambun Selatan
                                17510
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 15px; line-height:1px">
                            <b>No Telpon : 0821312133 | Email : example@gmail.com </b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
</body>

</html>
