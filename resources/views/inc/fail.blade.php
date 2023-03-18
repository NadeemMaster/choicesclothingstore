<!-- Fail message handler -->
@if (Session::has('fail'))
    <div class="alert alert-danger mt-2">
        {{ Session::get('fail') }}
    </div>
@endif
