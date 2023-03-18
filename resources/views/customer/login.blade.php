<!-- Customer Login -->
@extends('customer.main')

@push('title')
Customer Login
@endpush

@section('main-section')
    @push('loginimage')
        "{{ asset($setting->customer_login_image) }}" alt="LoginImage"
    @endpush

    @push('loginheading')
        <div class="col-md-6 mt-5 mb-3">
            <h3 class="heading mb-4 text-center">Customer Login</h3>
        @endpush

        @push('loginroute')
            {{ Route('login') }}
        @endpush

        @push('loginfooter')
            <div class="text-center mt-3">
                Don't have an account? <a href="{{ Route('signup') }}">Register here</a>
            </div>
        @endpush

        <div class="container">
            <div class="card mt-3 px-2">
                @include('inc.loginform')
            </div>
        </div>
    @endsection
