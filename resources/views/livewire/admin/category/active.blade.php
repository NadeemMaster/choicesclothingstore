<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form wire:submit.prevent="destroyCategory">
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
                    <h3>Active Categories
                        <a href="{{ Route('createcategory') }}" class="btn btn-primary btn-sm float-end text-white">Add
                            Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $i = ($categories->currentPage()-1)*$categories->perPage(); 
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td><img class="img-sm" src="{{ asset('uploads/category/' . $category->image) }}" /></td>
                                    <td>{{ $category->status == '1' ? 'Visible' : 'Hidden' }}</td>
                                    <td>
                                        <a href="{{ route('editcategory', ['category' => $category->id]) }}"
                                            class="btn btn-success mx-2">Edit</a>
                                        <a href="" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{ $categories->links() }}
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