<!-- Admin Registration -->
@extends('admin.main')

@push('title')
Add Customer
@endpush

@push('signupheading')
Add Customer
@endpush

@push('signuproute')
{{ Route('addcustomer') }}
@endpush

@push('signupbtn')
<div class="col-md-12 mb-3">
    <a href="{{ Route('customerindex') }}" class="btn btn-danger float-start text-white">Back</a>
    <button type="submit" class="btn btn-success float-end text-white">Add Customer</button>
</div>
@endpush

@section('main-section')

@include('inc.signupform')

@endsection