<!-- Privacy Policy -->
@extends('main')

@push('title')
    Privacy Policy
@endpush
@section('main-section')
    <div class="content">
        <img src="{{ url($setting->privacy_image) }}" alt="Image" class="img-fluid">
        <h2 class="heading mt-2 mb-3 text-center">{{$setting->privacy_title}}</h2>
        {!!$setting->privacy_policy!!}

    </div>
@endsection
