<!-- Customer Dashboard -->
@extends('customer.main')

@push('title')
Customer Dashboard
@endpush
@section('main-section')

<div class="row">
    <div class="col-md-12 grid-margin">
        @include('inc.fail')
        @include('inc.success')
        @include('inc.warning')
        <div class="me-md-3 me-xl-5">
            <h2>Welcome! {{ Session::get('customername') }},</h2>
        </div>
        <hr>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h5 class="mx-5 my-3">Order analytics</h5>
                    <div class="card-header">
                        <div class="row">

                            <div class="col-md-3">
                                <a href="{{ route('indexorder') }}" class="text-white text-decoration-none">
                                    <div class="card-body bg-success text-white text-center mb-1">
                                        <label class="mb-3">
                                            Total Orders
                                        </label>
                                        <br>
                                        <h1>
                                            {{ $totalorders }}
                                        </h1>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('receivedorder') }}" class="text-white text-decoration-none">
                                    <div class="card-body bg-primary text-white text-center mb-1">
                                        <label class="mb-3">
                                            Received Orders
                                        </label>
                                        <br>
                                        <h1>
                                            {{ $receivedorders }}
                                        </h1>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('confirmedorder') }}" class="text-white text-decoration-none">
                                    <div class="card-body bg-secondary text-white text-center mb-1">
                                        <label class="mb-3">
                                            Confirmed Orders
                                        </label>
                                        <br>
                                        <h1>
                                            {{ $confirmedorders }}
                                        </h1>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('pendingorder') }}" class="text-white text-decoration-none">
                                    <div class="card-body bg-warning text-white text-center mb-1">
                                        <label class="mb-3">
                                            Pending Orders
                                        </label>
                                        <br>
                                        <h1>
                                            {{ $pendingorders }}
                                        </h1>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@if ($pendingorders > 0)
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-primary">Pending Orders</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    You have <a href="{{ route('pendingorder') }}" class="text-decoration-none"><strong
                        class="text-danger">{{$pendingorders}} pending order </strong></a> please confirm pending.
                </div>
            </div>
    </div>
@endif

@endsection
