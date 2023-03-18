<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
Edit Product
@endpush
@section('main-section')

<livewire:admin.product.edit :product="$product" />

@endsection
