@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->


        @if (session()->has('success') && !session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @if (session()->has('success') && session()->get('success'))
            <div class="alert alert-success">
                Operation successful ✅
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary ml-2">
                    <i class="fas fa-plus"></i> 
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Price</th>
                                <th>Views</th>
                                <th>Actions</th>                                
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Price</th>
                                <th>Views</th>
                                <th>Actions</th>        
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($data as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        {{ $product->category->category_name ?? 'Không có' }}
                                    </td>
                                    <td>
                                        <img src="{{ Storage::url($product->image) }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td>${{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->view }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary">
                                            <i class="fas fa-info-circle"></i> <!-- Icon cho 'Chi tiết' -->
                                        </a>
                                    
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i> <!-- Icon cho 'Sửa' -->
                                        </a>
                                    
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Are you sure you want to hide ❓');">
                                            @csrf
                                            @method('DELETE') <!-- Sử dụng DELETE -->
                                            <button class="btn btn-danger" type="submit"
                                                style="border:none; background-color:#ffcccc; padding:7px; border-radius:5px;">
                                                <i class="fas fa-eye-slash" style="color:brown; font-size:20px;"></i>
                                                <!-- Icon thùng rác màu đỏ -->
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.products.forceDestroy', $product->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete ❓');">
                                            @csrf
                                            @method('DELETE') <!-- Sử dụng DELETE -->
                                            <button class="btn btn-danger" type="submit"
                                                style="border:none; background-color:red; padding:7px; border-radius:5px;">
                                                <i class="fas fa-trash" style="color:black; font-size:20px;"></i>
                                                <!-- Icon thùng rác màu đỏ -->
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.products.comments.index', $product->id) }}" class="btn btn-info">
                                            <i class="fas fa-comment" style="font-size:20px;"></i> <!-- Icon for 'Comments' -->
                                        </a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Phân trang --}}

                        <ul class="pagination">
                            {{ $data->links('vendor.pagination.default') }}
                          </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
