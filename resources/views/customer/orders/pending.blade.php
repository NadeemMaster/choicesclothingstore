@extends('customer.main')

@push('title')
    Pending Orders
@endpush

@section('main-section')

<livewire:orders.pending />

@endsection