@extends('layouts.admin')

@section('title')
Ubah Data Pasien
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
                    <h1 class="m-0">Pasien</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pasien</a></li>
                        <li class="breadcrumb-item active">Ubah Data</li>
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
                            <h3 class="card-title">Ubah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.patient.update', $patient) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @include('pages.admin.patient.errors.error-edit')
                            @method("PUT")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK"
                                        value="{{ $patient->nik ?? old('nik') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                        value="{{ $patient->name ?? old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control select2">
                                        <option value="L" @if ($patient->gender === 'L') selected @endif>Laki-laki
                                        </option>
                                        <option value="P" @if ($patient->gender === 'P') selected @endif>Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nomor HP</label>
                                    <input type="number" name="phone" class="form-control" id="phone"
                                        placeholder="Nomor HP" value="{{ $patient->phone ?? old('phone') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="birth_place">Tempat Lahir</label>
                                    <input type="text" name="birth_place" class="form-control" id="birth_place"
                                        placeholder="Tempat Lahir"
                                        value="{{ $patient->birth_place ?? old('birth_place') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date" id="birth_date" data-target-input="nearest">
                                        <input type="text" name="birth_date"
                                            value="{{ $patient->birth_date ?? old('birth_date') }}"
                                            class="form-control datetimepicker-input" data-target="#birth_date" />
                                        <div class="input-group-append" data-target="#birth_date"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"
                                        placeholder="Alamat">{{ $patient->address ?? old('address') }}</textarea>
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
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script>
    $('.select2').select2();
</script>

<script type="text/javascript">
    $(function () {
      //Date picker
      $('#birth_date').datetimepicker({
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
