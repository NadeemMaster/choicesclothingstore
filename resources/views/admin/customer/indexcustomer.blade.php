<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
Customers
@endpush
@section('main-section')
    <livewire:admin.customer-index/>
@endsection
