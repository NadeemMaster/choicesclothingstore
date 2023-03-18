<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
Total Products
@endpush
@section('main-section')
    <livewire:admin.product.index />
@endsection
