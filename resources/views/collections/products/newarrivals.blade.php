<!-- New Arrival Products -->
@if ($newarrivals->count() > 0)

    <div class="container py-3">
        <h2 class="mb-3">New Arrivals</h2>
        <div class="row">
            <div class="owl-carousel owl-theme newarrivals">
                @foreach ($newarrivals as $product)
                    <div class="item">
                        <a
                            href="{{ route('viewproduct', ['category_slug' => $product->category->slug, 'product_slug' => $product->slug]) }}">
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
                                            <span
                                                class="selling-price">{{ 'Rs.' . $product->selling_price . '/-' }}</span>
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
                                (not rated yet)
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
@endforeach

</div>
</div>
</div>

@endif

@push('script')
    <script>
        $('.newarrivals').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endpush
