<div>
    <div class="row">
        <div class="col-md-12 ">
            @include('inc.fail')
            @include('inc.success')
            <div class="card">
                <div class="card-header">
                    <h3>Pending Orders
                        <a href="{{ route('admindashboard') }}" class="btn btn-primary  float-end text-white">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ordered Placed</th>
                                <th>Tracking No</th>
                                <th>Order Amount</th>
                                <th>Payment Mode</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Delivery Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $i = ($orders->currentPage()-1)*$orders->perPage(); 
                            @endphp
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $order->created_at->format('d-M-Y h:i A') }}</td>
                                    <td>{{ $order->tracking_no }}</td>
                                    <td>{{'Rs.' . $order->order_amount . '/-'}}</td>
                                    <td>{{ $order->payment_mode }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td>
                                        <a href="{{route('adminvieworder', [ 'order_id' => $order->id])}}"
                                            class="btn btn-success mx-2">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="9">
                                        No Orders available
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div> 
</div>
