<!-- Success message handler -->
@if (Session::has('success'))
    <div class="alert alert-success mt-2">
        {{ Session::get('success') }}
    </div>
@endif
