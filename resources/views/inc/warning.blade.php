<!-- Warning message handler -->
@if (Session::has('warning'))
    <div class="alert alert-warning mt-2">
        {{ Session::get('warning') }}
    </div>
@endif