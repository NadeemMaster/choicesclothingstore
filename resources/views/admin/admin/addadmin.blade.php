<!-- Admin Registration -->
@extends('admin.main')

@push('title')
Add Admin
@endpush

@push('signupheading')
Add Admin
@endpush

@push('signuproute')
{{ Route('adminregister') }}
@endpush

@push('signupbtn')
<div class="col-md-12 mb-3">
    <a href="{{ Route('adminindex') }}" class="btn btn-danger float-start text-white">Back</a>
    <button type="submit" class="btn btn-success float-end text-white">Add Admin</button>
</div>
@endpush

@section('main-section')

@include('inc.signupform')

@endsection
