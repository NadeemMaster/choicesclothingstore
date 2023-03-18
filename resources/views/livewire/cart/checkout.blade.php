<div class="py-3 py-md-4 checkout">
    <div class="container">
        @include('inc.fail')
        @include('inc.success')
        <div class="row">
        <div class="col-md-9">
            <h4>Checkout</h4>
        </div>
            <div class="col-md-3">
            <a href="{{route('viewcart')}}" class="btn btn-primary float-end"><i class="fa fa-shopping-cart"> Cart</i> (<livewire:cart.cart-item-counter />)</a>
            </div>
        </div>
        <hr>
        <div class="shadow bg-white p-3">
        <div class="d-none d-sm-none d-mb-block d-lg-block">
            <div class="row">
                <div class="col-md-6">
                    <h5>Products</h5>
                </div>
                <div class="col-md-2">
                    <h5 class="float-end">Price</h5>
                </div>
                <div class="col-md-2">
                    <h5 class="float-end">Quantity</h5>
                </div>
                <div class="col-md-2">
                    <h5 class="float-end">Total Price</h5>
                </div>
            </div>
        </div>

        @foreach ($cartData as $cartitem)
            @if ($cartitem->product)
                <div>
                    <div class="row">
                        <div class="col-md-6 my-1">
                                <img class=" mx-2" src="{{ asset($cartitem->product->productImages[0]->image) }}"
                                        style="width: 70px; height: 70px" alt="">
                                <label class="product-name"><strong>
                                    {{ $cartitem->product->name }}</strong>
                                </label>
                        </div>

                        <div class="col-md-2 my-auto">
                            @if (!is_null($cartitem->product->discounted_price))
                                <label
                                    class="price float-end">{{ 'Rs.' . $cartitem->product->discounted_price . '/-' }}</label>
                            @else
                                <label
                                    class="price float-end">{{ 'Rs.' . $cartitem->product->selling_price . '/-' }}</label>
                            @endif
                        </div>

                        <div class="col-md-2 col-7 my-auto">
                                <label
                                class="quantity float-end">{{ $cartitem->quantity }}</label>
                        </div>

                        <div class="col-md-2 my-auto">
                            @if (!is_null($cartitem->product->discounted_price))
                                <label
                                    class="price float-end">{{ 'Rs. ' . $cartitem->product->discounted_price * $cartitem->quantity . '/-' }}</label>
                            @else
                                <label
                                    class="price float-end">{{ 'Rs. ' . $cartitem->product->selling_price * $cartitem->quantity . '/-' }}</label>
                            @endif

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        Total Order Amount :
                        <span class="float-end">{{ 'Rs. ' . $totalCartAmount . '/-' }}</span>
                    </h4>
                    <hr>
                    <small>* Package will be delivered in 3 - 5 working days.</small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        Shipping Information
                    </h4>
                    <hr>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label>Full Name</label>
                                <input type="text" wire:model="fullname" class="form-control" placeholder="Enter Full Name" />
                                <span class="text-danger">
                                    @error('fullname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Phone Number</label>
                                <input type="number" wire:model="phone" class="form-control" placeholder="Enter Phone Number" />
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Email Address</label>
                                <input type="email" wire:model="email" class="form-control" placeholder="Enter Email Address" />
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Province</label>
                                <input type="text" wire:model="province" class="form-control" placeholder="Enter Province Name" value="{{ old('province') }}" />
                                <span class="text-danger">
                                    @error('province')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>District</label>
                                <input type="text" wire:model="district" class="form-control" placeholder="Enter District Name" value="{{ old('district') }}" />
                                <span class="text-danger">
                                    @error('district')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>City</label>
                                <input type="text" wire:model="city" class="form-control" placeholder="Enter City Name" value="{{ old('city') }}" />
                                <span class="text-danger">
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Post Code (Zip-code)</label>
                                <input type="number" wire:model="postcode" class="form-control" placeholder="Enter Post code" value="{{ old('postcode') }}" />
                                <span class="text-danger">
                                    @error('postcode')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Full Address</label>
                                <textarea wire:model="address" class="form-control" rows="2"> {{ old('address') }} </textarea>
                                <span class="text-danger">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Select Payment Mode: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button wire:loading.attr="disabled" class="nav-link fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Cash on Delivery Mode</h6>
                                            <hr/>
                                            <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                <span wire:loading.remove wire:target="codOrder">
                                                Place Order (Cash on Delivery)
                                                </span>
                                                <span wire:loading wire:target="codOrder">
                                                Placing COD Order
                                                </span>
                                            </button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Pay with debit or credit card</h6>
                                            <hr/>
                                            <button type="button" wire:loading.attr="disabled" wire:click="payByCard" class="btn btn-warning">Pay Now (Debit/Credit Card)</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>
            </div>

        </div>
    </div>
</div>