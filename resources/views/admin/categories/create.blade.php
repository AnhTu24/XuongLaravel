@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <label for="" class="text-info" style="font-size: 30px">Add New Category</label>

        @if (session()->has('success') && !session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
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
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="category_name" class="form-label">Category Name:</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" value="{{ old('category_name') }}">
                </div>

                <button type="submit" class="btn btn-primary">Add New</button>
            </form>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-info mt-3">Back to List</a>
        </div>
    </div>
@endsection