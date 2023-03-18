@extends('admin.main')

@push('title')
Add Slider
@endpush
@section('main-section')
<!-- Add Slider -->
    <div class="row">
        <div class="col-md-12">
            @include('inc.fail')
            @include('inc.success')
            <div class="card">
                <div class="card-header">
                    <h3>Add Slider

                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ Route('addslider') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Slider Image</label>
                                <input type="file" name="image" class="form-control">
                                <span class="text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Strong Title</label>
                                <input type="text" name="strongtitle" class="form-control" value="{{ old('strongtitle') }}">
                                <span class="text-danger">
                                    @error('strongtitle')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label>Link</label>
                                <input type="text" name="link" class="form-control" value="{{ old('link') }}">
                                <span class="text-danger">
                                    @error('link')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="col-md-3 mb-3">
                                <label>Status</label><br />
                                <input type="checkbox" name="status">
                            </div>

                            <div class="col-md-12 mb-3">
                                <a href="{{ Route('indexslider') }}"
                                    class="btn btn-primary float-start text-white">Back</a>
                                <button type="submit" class="btn btn-success float-end text-white">Add Category</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
