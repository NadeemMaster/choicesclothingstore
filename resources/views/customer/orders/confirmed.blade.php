@extends('customer.main')

@push('title')
    Confirmed Orders
@endpush

@section('main-section')

<livewire:orders.confirmed />

@endsection