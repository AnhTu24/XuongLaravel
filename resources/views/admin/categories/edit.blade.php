@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <label for="" class="text-info" style="font-size: 30px">Edit Product</label>
        
        @if (session()->has('success') && session()->get('success'))
            <div class="alert alert-success">
                Operation successful ✅
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 

                <div class="mb-3">
                    <label for="category_id" class="form-label">Product Category:</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" value="{{ old('product_name', $product->product_name) }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="view" class="form-label">Views:</label>
                    <input type="number" class="form-control" id="view" name="view" value="{{ old('view', $product->view) }}">
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label">Size:</label>
                    <input type="text" class="form-control" id="size" name="size" value="{{ old('size', $product->size) }}">
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="color" class="form-control" id="color" name="color" value="{{ old('color', $product->color) }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Discount (%):</label>
                    <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount', $product->discount) }}">
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                </div>

                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}> Activate
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>

            <a href="{{ route('admin.products.index') }}" class="btn btn-info mt-3">Back to List</a>
        </div>
    </div>
@endsection
