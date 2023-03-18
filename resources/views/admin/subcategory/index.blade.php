<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
Total Sub Categories
@endpush
@section('main-section')
    <livewire:admin.sub-category.index/>
@endsection
