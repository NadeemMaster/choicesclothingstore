<!-- Admin Login -->
@extends('admin.main')

@push('title')
Admin Login
@endpush

@section('main-section')
    @push('loginimage')
        "{{ asset($setting->admin_login_image) }}" alt="AdminImage"
    @endpush

    @push('loginheading')
        <div class="col-md-6 mt-5 mb-3">
            <h3 class="heading mb-4 text-center">Admin Login</h3>
        @endpush

        @push('loginroute')
            {{ Route('adminlogin') }}
        @endpush

        @push('loginfooter')
            <div class="text-center mt-3">
                Don't have an account? <a href="{{ Route('contactus') }}">Contact Us</a>
            </div>
        @endpush

        <div class="container">
            <div class="card mt-3 px-2">
                @include('inc.loginform')
            </div>
        </div>
    @endsection
