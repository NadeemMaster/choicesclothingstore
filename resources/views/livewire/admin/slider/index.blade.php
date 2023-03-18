<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroySlider">
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
                    <h3>Sliders
                        <a href="{{ Route('createslider') }}" class="btn btn-primary btn-sm float-end text-white">Add
                            Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Slider Image</th>
                                    <th>Strong Title</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = ($sliders->currentPage() - 1) * $sliders->perPage();
                                @endphp
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td><img class="img-wide" src="{{ asset($slider->image) }}" /></td>
                                        <td>{{ $slider->strongtitle }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td>{{ $slider->link }}</td>
                                        <td>{{ $slider->status == '1' ? 'Visible' : 'Hidden' }}</td>
                                        <td width='15%'>
                                            <a href="{{ route('editslider', ['slider' => $slider->id]) }}"
                                                class="btn btn-sm text-white btn-success mx-2">Edit</a>
                                            <a href="" wire:click="deleteSlider({{ $slider->id }})"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                class="btn btn-sm text-white btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $sliders->links() }}
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
