@extends('main')

@push('title')
    Search Products
@endpush

@section('main-section')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="col-md-12">
                <h4 class="mb-4">Search results {{"'" . Request::get('searchbar') . "'"}}</h4>
            </div>
            @include('inc.fail')
            @include('inc.success')

            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-3">
                        <a href="{{ route('viewproduct',['category_slug' =>$product->category->slug , 'product_slug' =>$product->slug ])}}">
                            <div class="product-card">
                                <div class="product-card-img">
                                    @if ($product->quantity > 0)
                                        <label class="stock bg-success">In Stock</label>
                                    @else
                                        <label class="stock bg-danger">Out of Stock</label>
                                    @endif
    
                                    @if (!is_null($product->discount_percent))
                                        <label
                                            class="discount bg-primary">{{ '- ' . $product->discount_percent . '%' }}</label>
                                    @endif
    
                                    <img src="{{ asset($product->productImages[0]->image) }}" alt="product image">
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">
                                        {{ $product->category->name . ' / ' . $product->subcategory->name }}</p>
                                    <h5 class="product-name">
                                        {{ $product->name }}
                                    </h5>
                                    <div>
                                        @if (!is_null($product->discounted_price))
                                            <span
                                                class="selling-price">{{ 'Rs.' . $product->discounted_price . '/-' }}</span>
                                            <span
                                                class="original-price float-end">{{ 'Rs.' . $product->selling_price . '/-' }}</span>
                                        @else
                                            <span class="selling-price">{{ 'Rs.' . $product->selling_price . '/-' }}</span>
                                        @endif
                                    </div>
                        </a>
    
                        <div class="rating mt-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= round($product->productReviews->avg('rating')))
                                    <i class="fa fa-star checked"></i>
                                @else
                                    <i class="fa fa-star"></i>
                                @endif
                            @endfor
                            @if ($product->productReviews->count() > 0)
                                <span>{{ '( ' . $product->productReviews->count() . ' reviews )' }}</span>
                            @else
                                ( not rated yet )
                            @endif
                        </div>
    
                        <div class="mt-2">
                            @if ($product->quantity > 0)
                                <a href="{{ route('addtocart', ['product_id' => $product->id]) }}" class="btn btn1"><i
                                        class="fa fa-shopping-cart"></i> Add To Cart</a>
                            @else
                                <button type="button" disabled class="btn btn1">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add To Cart
                                </button>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    
    @empty
    
        <div class="col-md-12">
            <div class="product-card">
                <h5 class="mx-4 my-4">No products found! search again</h5>
            </div>
        </div>
        @endforelse
    <div>
        {{ $products->appends(request()->input())->links() }}
    </div>
    </div>
    

        </div>
    </div>
@endsection