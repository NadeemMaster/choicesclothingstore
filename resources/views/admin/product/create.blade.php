<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
Add Product
@endpush
@section('main-section')

<livewire:admin.product.create/>

@endsection
