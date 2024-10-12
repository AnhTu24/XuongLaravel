@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4 my-2">
                    <img src="{{ Storage::url($product->image) }}" class="card-img" alt="Product Image" height="500px" style="object-fit: cover">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">Product Name: {{ $product->product_name }}</h4>
                        <h5>Category: {{ $product->category->category_name }}</h5>
                        <p class="card-text">Description: {{ $product->description }}</p>
                        <p class="card-text">Price: ${{ $product->price }} </p>
                        <p class="card-text">Views: {{ $product->view }}</p>
                        <p class="card-text">Size: {{ $product->size }}</p>
                        <p class="card-text">Color: {{ $product->color }}</p>
                        <p class="card-text">Discount: {{ $product->discount }}%</p>
                        <p class="card-text">Quantity in stock: {{ $product->quantity }}</p>
                        <p class="card-text">Status: {{ $product->active ? 'Available' : 'Unavailable' }}</p>

                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
