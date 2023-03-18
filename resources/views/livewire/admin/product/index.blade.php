<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form wire:submit.prevent="destroyProduct">
                        <div class="modal-body">
                            <h6>Are you sure you want to delete this product?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <h3>Products
                        <a href="{{ Route('createproduct') }}" class="btn btn-primary btn-sm float-end text-white">Add
                            Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Trending</th>
                                <th>Featured</th>
                                <th>New Arrivals</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $i = ($products->currentPage()-1)*$products->perPage(); 
                        @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="{{ asset($product->productImages[0]->image) }}" /></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->subCategory->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '1' ? 'Visible' : 'Hidden' }}</td>
                                    <td>{{ $product->trending == '1' ? 'Yes' : 'No' }}</td>
                                    <td>{{ $product->featured == '1' ? 'Yes' : 'No' }}</td>
                                    <td>{{ $product->new_arrivals == '1' ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('editproduct', ['product' => $product->id]) }}"
                                            class="btn btn-success btn-sm text-white my-1 mx-2">Edit</a>
                                        <a href="" wire:click="deleteProduct({{$product->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            class="btn btn-danger btn-sm text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@if ($productslow->count() > 0)
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    @foreach ($productslow as $product)
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset($product->productImages[0]->image) }}" class="rounded me-2" width="20"
                    height="20" alt="product image">

                <strong class="me-auto">{{ $product->name }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Quantity of <strong class="text-danger">{{ $product->name }}</strong> is less than <strong
                    class="text-danger">20</strong> pieces.
            </div>
        </div>
    @endforeach
</div>
@endif

@push('script')

<script>
    window.addEventListener('close-modal', event => {

        $('#deleteModal').modal('hide');
    });
</script>

@endpush