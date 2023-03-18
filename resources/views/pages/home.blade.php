<!-- Home Page -->
@extends('main')

@push('title')
Welcome to {{$setting->app_name}}
@endpush
@section('main-section')
@include('inc.slider')
    @include('inc.fail')
    @include('inc.success')
    @include('collections.products.featured')
    @include('collections.products.trending')
    @include('collections.products.newarrivals')
    @include('collections.products.inbudget')
@endsection
