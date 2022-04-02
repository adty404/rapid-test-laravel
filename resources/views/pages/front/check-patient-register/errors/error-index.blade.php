@if (session('data'))
<div class="alert alert-danger" style="margin-top: 20px">
    <h5>
        <i class="fa fa-exclamation-triangle"></i> Error !!
    </h5>
    <p>{{ session('data') }}</p>
</div>
@endif
