<div class="py-3 py-md-5">
    <div class="container">

        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white border" wire:ignore>

                    <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach ($product->productImages as $productimage)
                                    <li><img src="{{ asset($productimage->image) }}" /></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn">
                                < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                        <a href="{{ url()->previous() }}" class="btn btn-primary float-end"><i class="fa fa-angle-left">
                                Back</i></a>
                    </h4>
                    <hr>
                    <p class="product-path">
                        Collections / {{ $product->category->name }} / {{ $product->subcategory->name }}
                    </p>
                    <div class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $avgrating)
                                <i class="fa fa-star checked"></i>
                            @else
                                <i class="fa fa-star"></i>
                            @endif
                        @endfor
                        @if ($reviews->count() > 0)
                            <span>{{ '( ' . $reviews->count() . ' reviews )' }}</span>
                        @else
                            ( not rated yet)
                        @endif
                    </div>
                    <div>
                        @if (!is_null($product->discounted_price))
                            <span class="selling-price">{{ 'Rs.' . $product->discounted_price . '/-' }}</span>
                            <span class="original-price">{{ 'Rs.' . $product->selling_price . '/-' }}</span>
                        @else
                            <span class="selling-price">{{ 'Rs.' . $product->selling_price . '/-' }}</span>
                        @endif

                    </div>

                    <div class="my-2">
                        @if ($product->quantity > 0)
                            <label class="label-stock bg-success">In Stock</label>
                        @else
                            <label class="label-stock bg-danger">Out of Stock</label>
                        @endif
                    </div>

                    <div class="mt-2">
                        @if ($product->quantity > 0)
                            <div class="input-group">
                                <span class="btn btn1" wire:click="quantityDecrement"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}"
                                    readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="quantityIncrement"><i class="fa fa-plus"></i></span>
                            </div>
                        @else
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="0" readonly class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        @endif
                    </div>

                    <div class="mt-2">
                        @if ($product->quantity > 0)
                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i>
                                Add To Cart
                            </button>
                        @else
                            <button type="button" disabled class="btn btn1">
                                <i class="fa fa-shopping-cart"></i>
                                Add To Cart
                            </button>
                        @endif
                    </div>

                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {{ $product->small_description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description-tab-pane" type="button" role="tab"
                                    aria-controls="description-tab-pane" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                    data-bs-target="#reviews-tab-pane" type="button" role="tab"
                                    aria-controls="reviews-tab-pane" aria-selected="false">Reviews</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
                                aria-labelledby="description-tab" tabindex="0">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel"
                                aria-labelledby="reviews-tab" tabindex="0">
                                <div id="reviews">
                                    <h2 class="reviews-title mt-2">
                                        @if ($reviews->count() > 0)
                                            {{ '( ' . $reviews->count() . ' reviews )' }}
                                        @else
                                            (0 reviews)
                                        @endif for <span
                                            class="text-primary"><strong>{{ $product->name }}</strong></span>
                                    </h2>
                                    <ol class="reviewlist">
                                        @forelse ($reviews as $review)
                                            <li>
                                                <div class="review-container">
                                                    <img alt="" src="{{ asset($review->users->image) }}"
                                                        height="80" width="80">
                                                    <div class="review-block">
                                                        <p class="review-info text-secondary">
                                                            <strong>{{ $review->users->name }}</strong>
                                                            <span>– {{ $review->created_at }}</span>
                                                        </p>
                                                        <div class="rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->rating)
                                                                    <i class="fa fa-star checked"></i>
                                                                @else
                                                                    <i class="fa fa-star"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <div class="review-text">
                                                            <p><strong>{{ $review->comments }}</strong></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            No reviews
                                        @endforelse
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(function() {

            $("#exzoom").exzoom({

                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000

            });

        });
    </script>
@endpush
