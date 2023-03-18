@extends('main')
@push('title')
    {{ $product->name }}
@endpush

@push('meta_title')
    {{ $product->meta_title }}
@endpush

@push('meta_description')
    {{ $product->meta_description }}
@endpush

@push('meta_keywords')
    {{ $product->meta_keywords }}
@endpush

@section('main-section')

<livewire:products.view :category="$category" :product="$product" />

@endsection