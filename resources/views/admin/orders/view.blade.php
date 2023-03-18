@extends('admin.main')

@push('title')
    Order detail
@endpush

@section('main-section')

<livewire:admin.order.view :order_id="$order_id" />

@endsection