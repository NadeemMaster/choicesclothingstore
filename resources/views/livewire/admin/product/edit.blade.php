<div class="row">
    <div class="col-md-12">
        @include('inc.fail')
        @include('inc.success')
        <div class="card">
            <div class="card-header">
                <h3>Edit Product

                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('updateproduct',['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-2 mb-3">
                            <label>Category</label>

                            <select name="category_id" class="form-control">
                                <option value="{{$product->category_id}}" selected}}>
                                    {{$product->category->name}}
                                </option>
                            </select>
                            
                            <span class="text-danger">
                                @error('category_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label>Sub Category</label>
                            <select name="subcategory_id" class="form-control">
                                @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}" {{$subcategory->id == $product->subcategory_id ? 'selected' : ''}}>
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
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                            <span class="text-danger">
                                @error('slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-7 mb-3">
                            <label>Small Description</label>
                            <textarea name="small_description" class="form-control" rows="3">{{ $product->small_description }}</textarea>
                            <span class="text-danger">
                                @error('small_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-1 mb-3">
                            <label>Status</label><br />
                            <input type="checkbox" name="status"  {{ $product->status == '1' ? 'checked' : '' }}>
                        </div>

                        <div class="col-md-1 mb-3">
                            <label>Trending</label><br />
                            <input type="checkbox" name="trending"  {{ $product->trending == '1' ? 'checked' : '' }}>
                        </div>

                        <div class="col-md-1 mb-3">
                            <label>Featured</label><br />
                            <input type="checkbox" name="featured"  {{ $product->featured == '1' ? 'checked' : '' }}>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label>New Arrivals</label><br />
                            <input type="checkbox" name="new_arrivals"  {{ $product->new_arrivals == '1' ? 'checked' : '' }}>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Product Images</label>
                            <input type="file" name="image[]" multiple class="form-control">
                            <div>
                            <div class="row">
                                @foreach ($product->productImages as $image)
                                <div class="col-md-1">
                                    <img src="{{asset($image->image)}}" style="width:80px; height:80px;" class="me-4 mt-2 border" alt="product image"/>
                                    <a href="{{route('deleteproductimage', ['productimage_id' => $image->id])}}" class="d-block text-center">Remove</a>
                                </div>
                                    @endforeach
                            </div>    
                        </div>   
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Cost Price</label>
                            <input type="text" name="cost_price" class="form-control" value="{{ $product->cost_price }}">
                            <span class="text-danger">
                                @error('cost_price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                            <span class="text-danger">
                                @error('selling_price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Discounted Price</label>
                            <input type="text" name="discounted_price" class="form-control" value="{{ $product->discounted_price }}">
                            <span class="text-danger">
                                @error('discounted_price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Discount ٪</label>
                            <input type="text" name="discount_percent" class="form-control" value="{{ $product->discount_percent}}">
                            <span class="text-danger">
                                @error('discount_percent')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Quantity</label>
                            <input type="text" name="quantity" class="form-control" value="{{ $product->quantity}}">
                            <span class="text-danger">
                                @error('quantity')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Product SKU</label>
                            <input type="text" name="sku" class="form-control" value="{{ $product->sku}}">
                            <span class="text-danger">
                                @error('sku')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                            <span class="text-danger">
                                @error('meta_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $product->meta_description }}</textarea>
                            <span class="text-danger">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="3">{{ $product->meta_keywords }}</textarea>
                            <span class="text-danger">
                                @error('meta_keywords')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12 mb-3">
                            <a href="{{ Route('indexproduct') }}"
                                class="btn btn-primary float-start text-white">Back</a>
                            <button type="submit" class="btn btn-success float-end text-white">Update Product</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
