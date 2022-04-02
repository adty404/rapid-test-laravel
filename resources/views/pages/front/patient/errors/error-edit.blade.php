@if ($errors->any())
<div class="alert alert-danger" style="margin-top: 20px">
    <h5>
        <i class="fa fa-exclamation-triangle"></i> Error !!
    </h5>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@isset($data)
<div class="alert alert-danger" style="margin-top: 20px">
    <h5>
        <i class="fa fa-exclamation-triangle"></i> Error !!
    </h5>
    <ul>
        <li>Jadwal tidak tersedia pada <b>{{ $data->start_date }} - {{ $data->end_date }}</b></li>
    </ul>
</div>
@endisset


{{-- @if (session('data'))
<div class="alert alert-danger" style="margin-top: 20px">
    <h5>
        <i class="fa fa-exclamation-triangle"></i> Error !!
    </h5>
    <ul>
        <li>Jadwal tidak tersedia pada <b>{{ session('data')->start_date }} - {{
                session('data')->end_date }}</li>
    </ul>
</div>
@endif --}}
