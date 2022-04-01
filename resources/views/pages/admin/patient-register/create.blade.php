@extends('layouts.admin')

@section('title')
Tambah Data Pendaftaran
@endsection

@push('prepend-style')
<link href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pendaftaran Pasien</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pendaftaran Pasien</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
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
                            <h3 class="card-title">Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.register-patient.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('pages.admin.patient-register.errors.error-create')
                                <div class="form-group">
                                    <label for="patient_id">Nik</label>
                                    <select name="patient_id" id="patient_id" class="form-control select2">
                                        @foreach ($patient as $p)
                                        <option value="{{ $p->id }}">{{ $p->nik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Tanggal</label>
                                    <div class="input-group date" id="start_date" data-target-input="nearest">
                                        <input type="text" name="start_date" class="form-control datetimepicker-input"
                                            data-target="#start_date" />
                                        <div class="input-group-append" data-target="#start_date"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="start_time">Waktu</label>

                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                        <input type="text" name="start_time" class="form-control datetimepicker-input"
                                            data-target="#timepicker" />
                                        <div class="input-group-append" data-target="#timepicker"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
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
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script>
    $('.select2').select2();
</script>

<script type="text/javascript">
    $(function () {
      //Date picker
      $('#start_date').datetimepicker({
        minDate: new Date,
        locale: "en",
        format: "YYYY-MM-DD",
      });

      //Timepicker
      $('#timepicker').datetimepicker({
        use24hours: true,
        format: 'HH:mm',
      });

    })

</script>
@endpush
