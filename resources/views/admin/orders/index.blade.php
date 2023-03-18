@extends('admin.main')

@push('title')
Total Orders
@endpush

@section('main-section')

<livewire:admin.order.index />

@endsection