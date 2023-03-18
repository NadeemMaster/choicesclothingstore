@extends('customer.main')

@push('title')
    Received Orders
@endpush

@section('main-section')

<livewire:orders.received />

@endsection