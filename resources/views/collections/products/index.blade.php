@extends('main')

@push('title')
    {{ $category->name }}
@endpush

@push('meta_title')
    {{ $category->meta_title }}
@endpush

@push('meta_description')
    {{ $category->meta_description }}
@endpush

@push('meta_keywords')
    {{ $category->meta_keywords }}
@endpush

@section('main-section')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="col-md-12">
                <h4 class="mb-4">Products in {{ $category->name }}</h4>
            </div>
            @include('inc.fail')
            @include('inc.success')
            <livewire:products.index :category="$category" />

        </div>
    </div>
@endsection
