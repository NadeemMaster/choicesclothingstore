<!-- Customer Registration -->
@extends('customer.main')

@push('title')
Customer Signup
@endpush

@push('signupheading')
Please fill the below detail for registration!
@endpush

@push('signuproute')
{{ Route('register') }}
@endpush

@push('signupbtn')
<div class="text-center">
    <button type="submit" class="btn btn-primary w-50">Register</button>
</div>
<div class="text-center mt-3 mb-3">
    Already registered? <a href="{{ Route('loginform') }}">Login here</a>.
</div>
@endpush

@section('main-section')

@include('inc.signupform')

@endsection
