<div class="row">
    <div class="col-md-12">
        @include('inc.fail')
        @include('inc.success')
        <div class="card">
            <div class="card-header">
                <h3>Add Product</h3>
            </div>
            <div class="card-body">
                <form action="{{ Route('addproduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control" wire:model="categoryInput">
                                <option selected hidden>Please select</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('category_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label>Select SubCategory</label>
                            <select name="subcategory_id" class="form-control">
                                <option selected disabled hidden>Please select</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">
                                    {{$subcategory->name}}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('subcategory_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                            <span class="text-danger">
                                @error('slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-7 mb-3">
                            <label>Small Description</label>
                            <textarea name="small_description" class="form-control" rows="3">{{ old('small_description') }}</textarea>
                            <span class="text-danger">
                                @error('small_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        
                        <div class="col-md-1 mb-3">
                            <label>Status</label><br />
                            <input type="checkbox" name="status">
                        </div>

                        <div class="col-md-1 mb-3">
                            <label>Trending</label><br />
                            <input type="checkbox" name="trending">
                        </div>

                        <div class="col-md-1 mb-3">
                            <label>Featured</label><br />
                            <input type="checkbox" name="featured">
                        </div>
                        
                        <div class="col-md-2 mb-3">
                            <label>New Arrivals</label><br />
                            <input type="checkbox" name="new_arrivals">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Product Images</label>
                            <input type="file" name="image[]" multiple class="form-control">
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Cost Price</label>
                            <input type="text" name="cost_price" class="form-control"
                                value="{{ old('cost_price') }}">
                            <span class="text-danger">
                                @error('cost_price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" class="form-control"
                                value="{{ old('selling_price') }}">
                            <span class="text-danger">
                                @error('selling_price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Discounted Price</label>
                            <input type="text" name="discounted_price" class="form-control"
                                value="{{ old('discounted_price') }}">
                            <span class="text-danger">
                                @error('discounted_price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Discount %</label>
                            <input type="text" name="discount_percent" class="form-control"
                                value="{{ old('discount_percent') }}">
                            <span class="text-danger">
                                @error('discount_percent')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label>Quantity</label>
                            <input type="text" name="quantity" class="form-control"
                                value="{{ old('quantity') }}">
                            <span class="text-danger">
                                @error('quantity')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                                                   
                        <div class="col-md-4 mb-3">
                            <label>Product SKU</label>
                            <input type="text" name="sku" class="form-control"
                                value="{{ old('sku') }}">
                            <span class="text-danger">
                                @error('sku')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control"
                                value="{{ old('meta_title') }}">
                            <span class="text-danger">
                                @error('meta_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
                            <span class="text-danger">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="3">{{ old('meta_keywords') }}</textarea>
                            <span class="text-danger">
                                @error('meta_keywords')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12 mb-3">
                            <a href="{{ Route('indexproduct') }}"
                                class="btn btn-danger float-start text-white">Back</a>
                            <button type="submit" class="btn btn-success float-end text-white">Add Product</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>