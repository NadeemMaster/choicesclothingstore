@extends('main')
@push('title')
    Thankyou
@endpush

@section('main-section')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="p-4 shadow bg-white">
                        @if (Session::has('alert'))
                            <h5 class="text-success mt-2">
                                {{ Session::get('alert') }}
                            </h5>
                        @endif
                        <h4 class="mb-3">Thank You for shopping.</h4>
                        <a href="{{route('index')}}" class="btn btn-primary">Shop More</a>
                        <a href="{{route('indexorder')}}" class="btn btn-secondary">View Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
