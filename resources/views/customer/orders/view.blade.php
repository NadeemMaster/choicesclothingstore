@extends('customer.main')

@push('title')
    My Order detail
@endpush

@section('main-section')

<livewire:orders.view :order_id="$order_id" />

@endsection