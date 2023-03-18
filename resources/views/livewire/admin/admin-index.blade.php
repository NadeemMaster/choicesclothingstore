<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form wire:submit.prevent="destroyAdmin">
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
            @include('inc.warning')
            <div class="card">
                <div class="card-header">
                    <h3>Admins
                        <a href="{{ Route('newadmin') }}" class="btn btn-primary btn-sm float-end text-white">Add
                            Admin</a>
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
                                $i = ($admins->currentPage()-1)*$admins->perPage(); 
                            @endphp
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>
                                        @if(is_null($admin->image))
                                            <img src="{{ asset('uploads/profile/default.png') }}" />
                                        @else
                                        <img src="{{ asset($admin->image) }}" />
                                        @endif
                                    </td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->contact_no }}</td>
                                    <td>{{ $admin->gender }}</td>
                                    <td>
                                        <a href="{{ route('adminedit',['admin' => $admin->id ]) }}"
                                            class="btn btn-success btn-sm my-1 mx-2 text-white">Edit</a>
                                        <a href="" wire:click="deleteAdmin({{$admin->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            class="btn btn-danger btn-sm text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    {{ $admins->links() }}
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
