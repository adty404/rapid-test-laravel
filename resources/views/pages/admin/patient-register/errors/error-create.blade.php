@if ($errors->any())
<div class="alert alert-danger">
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
        <li>Jadwal tidak tersedia pada
            <b>
                {{ \Carbon\Carbon::parse($data->start_date)->format('d M Y') }},
                {{ \Carbon\Carbon::parse($data->start_date)->format('H:i') . ' - ' .
                \Carbon\Carbon::parse($data->end_date)->format('H:i') }}</b>
        </li>
    </ul>
</div>
@endisset
