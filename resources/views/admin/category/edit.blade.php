<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
Edit Category
@endpush
@section('main-section')
    <div class="row">
        <div class="col-md-12">
            @include('inc.fail')
            @include('inc.success')
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category

                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('updatecategory', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
                                <span class="text-danger">
                                    @error('slug')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset('uploads/category/'.$category->image)}}" width="60px" height="60px"/>
                                <span class="text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Status</label><br />
                                <input type="checkbox" name="status"  {{ $category->status == '1' ? 'checked' : '' }}>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
                                <span class="text-danger">
                                    @error('meta_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                                <span class="text-danger">
                                    @error('meta_description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control" rows="3">{{ $category->meta_keywords }}</textarea>
                                <span class="text-danger">
                                    @error('meta_keywords')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <a href="{{ Route('indexcategory') }}"
                                    class="btn btn-danger float-start text-white">Back</a>
                                <button type="submit" class="btn btn-success float-end text-white">Update Category</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
