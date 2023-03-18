<div>
    <div wire:ignore.self class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Order Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="confirmOrder">
                    <div class="modal-body">
                        <h6>Are you sure you want to confirm this order?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success text-white">Yes. Confirm Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Order Cancelation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="cancelOrder">
                    <div class="modal-body">
                        <h6>Are you sure you want to cancel this order?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger text-white">Yes. Cancel Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delivery Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateDelivery">
                    <div class="modal-body">
                        <label>Delivery Date</label>
                        <input wire:model.defer="deliverydate" type="date" class="form-control" />
                        <small class="text-danger">
                            @error('deliverydate')
                                {{ $message }}
                            @enderror
                        </small>
                        <br>
                        <h6 class="py-5">Order received successfully!</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success text-white">Yes. Received</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Product Review</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="submitReview">
                    <div class="modal-body">
                        <h6 class="mb-4">Please rate the product</h6>
                        <div class="rating">
                            <input type="radio" value="5" name="rating" wire:model.defer="rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                            <input type="radio" value="4" name="rating" wire:model.defer="rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="3" name="rating" wire:model.defer="rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="2" name="rating" wire:model.defer="rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="1" name="rating" wire:model.defer="rating" id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                        </div>
                            <small class="text-danger">
                                @error('rating')
                                    {{ $message }}
                                @enderror
                            </small>
                        <br>
                        <label>Your views about the product</label>
                        <textarea name="comments" wire:model.defer="comments" rows="8" class="form-control"
                            placeholder="Your Comments here" /></textarea>
                        <small class="text-danger">
                            @error('comments')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success text-white">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 ">
            @include('inc.fail')
            @include('inc.success')
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="mt-2">
                                My Order Details
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('indexorder') }}"
                                class="btn btn-primary float-end text-white mx-2">Back</a>
                            @if ($order->delivery_status == 'in progress')
                                <a href="" data-bs-toggle="modal" data-bs-target="#updateModal"
                                    class="btn btn-success float-end text-white mx-2">Update Delivery Status</a>
                            @endif
                            @if ($order->status == 'pending')
                                <a href="" data-bs-toggle="modal" data-bs-target="#cancelModal"
                                    class="btn btn-danger float-end text-white mx-2">Cancel Order</a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#confirmModal"
                                    class="btn btn-success float-end text-white mx-2">Confirm Order</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Order details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Order Id:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->id }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Tracking No:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-danger text-uppercase">
                                                {{ $order->tracking_no }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Order Amount:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->order_amount }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Payment Mode:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->payment_mode }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Payment Status:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->payment_status }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Order Placed at:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->created_at->format('d-M-Y h:i A') }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Order Status:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $order->status }}
                                        </div>
                                    </div>
                                    @if ($order->status == 'confirmed')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Confirmation Date:</h6>
                                            </div>
                                            <div class="col-md-6">
                                                {{ date('d-M-Y h:i A', strtotime($order->confirmed_date)) }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Delivery Status:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-success text-uppercase">
                                                {{ $order->delivery_status }}
                                            </span>
                                        </div>
                                    </div>
                                    @if ($order->delivery_status == 'Received')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Delivery Date:</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="text-success text-uppercase">
                                                    {{ date('d-M-Y', strtotime($order->delivery_date)) }}
                                                </span>
                                            </div>
                                        </div>
                                    @elseif ($order->status == 'canceled')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Cancelation Date:</h6>
                                            </div>
                                            <div class="col-md-6">
                                                {{ date('d-M-Y h:i A', strtotime($order->canceled_date)) }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Shipping details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h6>Full Name:</h6>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->fullname }}
                                </div>
                                <div class="col-md-3">
                                    <h6>Contact No:</h6>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->phone }}
                                </div>
                                <div class="col-md-3">
                                    <h6>Email:</h6>
                                </div>
                                <div class="col-md-9">
                                    {{ $order->email }}
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h6>Province:</h6>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $order->province }}
                                        </div>
                                        <div class="col-md-2">
                                            <h6>District:</h6>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $order->district }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h6>City:</h6>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $order->city }}
                                        </div>
                                        <div class="col-md-3">
                                            <h6>Post Code:</h6>
                                        </div>
                                        <div class="col-md-3">
                                            {{ $order->postcode }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <h6>Address:</h6>
                                </div>
                                <div class="col-md-10">
                                    {{ $order->address }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="shadow bg-white table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $totalamount = 0;
                            @endphp
                            @foreach ($order->orderItems as $orderitem)
                                <tr>
                                    <td width="5%">{{ $i++ }}</td>
                                    <td width="12%"><img
                                            src="{{ asset($orderitem->product->productImages[0]->image) }}"
                                            style="width: 70px; height: 70px" alt=""></td>
                                    <td class="fw-bold">{{ $orderitem->product->name }}</td>
                                    <td width="10%">{{ 'Rs.' . $orderitem->price . '/-' }}</td>
                                    <td width="10%">{{ $orderitem->quantity }}</td>
                                    <td width="12%" class="fw-bold">
                                        {{ 'Rs.' . $orderitem->price * $orderitem->quantity . '/-' }}
                                    </td>
                                    <td width="10%">
                                        @if ($order->delivery_status == 'Received')
                                        <a href="" wire:click="writeReview({{ $orderitem->id }})"
                                            data-bs-toggle="modal" data-bs-target="#reviewModal">Write Review</a>
                                        @else
                                            wait for delivery
                                        @endif
                                    </td>
                                    @php
                                        $totalamount += $orderitem->price * $orderitem->quantity;
                                    @endphp
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="fw-bold"> </td>
                                <td colspan="1" class="fw-bold">Total Amount: </td>
                                <td colspan="1" class="fw-bold">{{ 'Rs.' . $totalamount . '/-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#updateModal').modal('hide');
            $('#cancelModal').modal('hide');
            $('#confirmModal').modal('hide');
            $('#reviewModal').modal('hide');
        });
    </script>
@endpush
