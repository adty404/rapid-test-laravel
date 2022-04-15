@extends('layouts.admin')

@section('title')
Ubah data Hasil Rapid Test
@endsection

@push('prepend-style')
<link href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="content-wrapper">
    @include('sweetalert::alert')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah data Hasil Rapid Test</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Ubah data Hasil Rapid Test</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Ubah data Hasil Rapid Test</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.test-result.update', $test_result) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="card-body">
                                @include('pages.admin.test-result.errors.error-edit')
                                <div class="form-group">
                                    <label for="regsiter_number">Nomor Pendaftaran</label>
                                    <input type="text" name="register_number" class="form-control" id="regsiter_number" placeholder="Nomor Pendaftaran"
                                        value="{{ $test_result->patientRegister->register_number ?? old('regsiter_number') }}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="result">Hasil</label>
                                    <select name="result" id="result" class="form-control select2">
                                        <option value="positif" {{ $test_result->result === 'positif' ? 'selected' : '' }}>Positif</option>
                                        <option value="negatif" {{ $test_result->result === 'negatif' ? 'selected' : '' }}>Negatif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="rujukan">Rujukan</label>
                                    <input type="text" name="rujukan" id="rujukan" class="form-control" placeholder="Masukkan Rujukan" value="{{ $test_result->testResultDetail->rujukan ?? old('rujukan') }}">
                                </div>
                                <div class="form-group">
                                    <label for="penanggung_jawab">Penanggung Jawab</label>
                                    <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="form-control" placeholder="Masukkan Penanggung Jawab" value="{{ $test_result->testResultDetail->penanggung_jawab ?? old('penanggung_jawab') }}">
                                </div>
                                <div class="form-group">
                                    <label for="pemeriksa">Pemeriksa</label>
                                    <input type="text" name="pemeriksa" id="pemeriksa" class="form-control" placeholder="Masukkan pemeriksa" value="{{ $test_result->testResultDetail->pemeriksa ?? old('pemeriksa') }}">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan" value="{{ $test_result->testResultDetail->keterangan ?? old('keterangan') }}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@push('addon-script')
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $('.select2').select2();
</script>
@endpush
