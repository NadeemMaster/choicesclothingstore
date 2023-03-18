@extends('admin.main')

@push('title')
Pending Orders
@endpush

@section('main-section')

<livewire:admin.order.pending />

@endsection