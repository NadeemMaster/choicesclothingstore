@extends('customer.main')

@push('title')
    My Orders
@endpush

@section('main-section')

<livewire:orders.index />

@endsection