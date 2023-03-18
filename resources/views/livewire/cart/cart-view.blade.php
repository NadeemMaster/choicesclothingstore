<div class="py-3 py-md-5">
    <div class="container">
        @include('inc.fail')
        @include('inc.success')
        <h4>My Cart</h4>
        <hr>
        @if ($cart->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Total Price</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Action</h4>
                                </div>
                            </div>
                        </div>

                        @foreach ($cart as $cartitem)
                            @if ($cartitem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a
                                                href="{{ route('viewproduct', ['category_slug' => $cartitem->product->category->slug, 'product_slug' => $cartitem->product->slug]) }}">
                                                <label class="product-name">
                                                    <img src="{{ asset($cartitem->product->productImages[0]->image) }}"
                                                        style="width: 70px; height: 70px" alt="">
                                                    {{ $cartitem->product->name }}
                                                </label>
                                            </a>
                                        </div>

                                        <div class="col-md-1 my-auto">
                                            @if (!is_null($cartitem->product->discounted_price))
                                                <label
                                                    class="price">{{ 'Rs.' . $cartitem->product->discounted_price . '/-' }}</label>
                                            @else
                                                <label
                                                    class="price">{{ 'Rs.' . $cartitem->product->selling_price . '/-' }}</label>
                                            @endif
                                        </div>

                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button" wire:loading.attr="disabled"
                                                        wire:click="quantityDecrement({{ $cartitem->id }})"
                                                        class="btn btn1"><i class="fa fa-minus"></i></button>

                                                    <input type="text" value="{{ $cartitem->quantity }}"
                                                        class="input-quantity" />

                                                    <button type="button" wire:loading.attr="disabled"
                                                        wire:click="quantityIncrement({{ $cartitem->id }})"
                                                        class="btn btn1"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2 my-auto">
                                            @if (!is_null($cartitem->product->discounted_price))
                                                <label
                                                    class="price">{{ 'Rs. ' . $cartitem->product->discounted_price * $cartitem->quantity . '/-' }}</label>
                                                @php
                                                    $subtotal += $cartitem->product->discounted_price * $cartitem->quantity;
                                                @endphp
                                            @else
                                                <label
                                                    class="price">{{ 'Rs. ' . $cartitem->product->selling_price * $cartitem->quantity . '/-' }}</label>
                                                @php
                                                    $subtotal += $cartitem->product->selling_price * $cartitem->quantity;
                                                @endphp
                                            @endif

                                        </div>

                                        <div class="col-md-1 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="deleteItem({{ $cartitem->id }})"
                                                    class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove
                                                        wire:target="deleteItem({{ $cartitem->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading wire:target="deleteItem({{ $cartitem->id }})">
                                                        <i class="fa fa-trash"></i> Removing
                                                    </span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">
                    <div class="shadow-sm p-3">
                        <h4>Sub Total:
                            <span class="float-end">{{ 'Rs. ' . $subtotal . '/-' }}</span>
                        </h4>
                        <hr>
                        <a href="{{ route('checkout') }}" class="btn btn-warning w-100">Checkout</a>
                    </div>
                </div>
            </div>
        @else
        <div class="card card-body shadow text-center">
            <h4>No items added to cart.</h4>
            <div class="col-md-12">
                <a href="{{route('indexcategories')}}" class="btn btn-primary" >Shop Now</a>
            </div>
        </div>
        @endif
    </div>
</div>
