@extends('layouts.admin')

@section('title')
Tambah data Hasil Rapid Test
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
                    <h1 class="m-0">Tambah data Hasil Rapid Test</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tambah data Hasil Rapid Test</a></li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah data Hasil Rapid Test</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.test-result.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('pages.admin.test-result.errors.error-create')
                                <div class="form-group">
                                    <label for="register_number">Nomor Pendaftaran</label>
                                    <select name="register_number" id="register_number" class="form-control select2">
                                        @foreach ($patient_register as $item)
                                            <option value="{{ $item->register_number }}">{{ $item->register_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="result">Hasil</label>
                                    <select name="result" id="result" class="form-control select2">
                                        <option value="positif">Positif</option>
                                        <option value="negatif">Negatif</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
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
