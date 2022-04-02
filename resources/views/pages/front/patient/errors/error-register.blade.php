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

@if (session('closed_hours'))
<div class="alert alert-danger" style="margin-top: 20px">
    <h5>
        <i class="fa fa-exclamation-triangle"></i> Error !!
    </h5>
    <ul>
        <li>Tidak dapat mendaftar pada jam-jam berikut:
            <b>
                @foreach (session('closed_hours') as $closed_hour)
                {{ $loop->first ? '' : ', ' }}
                {{ $closed_hour }}
                @endforeach
            </b>
        </li>
    </ul>
</div>
@endif

@if (session('data'))
<div class="alert alert-danger" style="margin-top: 20px">
    <h5>
        <i class="fa fa-exclamation-triangle"></i> Error !!
    </h5>
    <ul>
        <li>Jadwal tidak tersedia pada <b>{{ session('data')->start_date }} - {{ session('data')->end_date }}</li>
    </ul>
</div>
@endif
