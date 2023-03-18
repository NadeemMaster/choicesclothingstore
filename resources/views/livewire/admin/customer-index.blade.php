<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form wire:submit.prevent="destroyCustomer">
                        <div class="modal-body">
                            <h6>Are you sure you want to delete this data?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes. Delete</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('inc.fail')
            @include('inc.success')
            <div class="card">
                <div class="card-header">
                    <h3>Customers
                        <a href="{{ Route('newcustomer') }}" class="btn btn-primary btn-sm float-end text-white">Add
                            Customer</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>E-mail</th>
                                <th>Contact No.</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $i = ($customers->currentPage()-1)*$customers->perPage(); 
                            @endphp
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>
                                        @if(is_null($customer->image))
                                            <img src="{{ asset('uploads/profile/default.png') }}" />
                                        @else
                                        <img src="{{ asset($customer->image) }}" />
                                        @endif
                                    </td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->contact_no }}</td>
                                    <td>{{ $customer->gender }}</td>
                                    <td>
                                        <a href="{{ route('customeredit', [ 'customer' => $customer->id ]) }}"
                                            class="btn btn-success btn-sm my-1 mx-2 text-white">Edit</a>
                                        <a href="" wire:click="deleteCustomer({{$customer->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            class="btn btn-danger btn-sm text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')

<script>
    window.addEventListener('close-modal', event => {

        $('#deleteModal').modal('hide');
    });
</script>

@endpush
