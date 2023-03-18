<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
Active Products
@endpush
@section('main-section')
    <livewire:admin.product.active />
@endsection
