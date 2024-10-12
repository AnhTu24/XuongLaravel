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
                <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary ml-2">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($data as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.show', $category->id) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-info-circle"></i> <!-- Icon for 'Details' -->
                                        </a>

                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i> <!-- Icon for 'Edit' -->
                                        </a>

                                        @if ($category->trashed())
                                            <!-- Nút khôi phục khi danh mục đã bị xóa mềm -->
                                            <form action="{{ route('admin.categories.restore', $category->id) }}"
                                                method="POST" style="display:inline-block;"
                                                onsubmit="return confirm('Are you sure you want to restore this category ❓');">
                                                @csrf
                                                @method('PATCH') <!-- Use PATCH for restore -->
                                                <button class="btn btn-danger" type="submit"
                                                style="border:none; background-color:#ffcccc; padding:7px; border-radius:5px;">
                                                <i class="fas fa-eye-slash" style="color:brown; font-size:20px;"></i>
                                                <!-- Icon for hiding category -->
                                            </button>
                                            </form>
                                        @else
                                            <!-- Nút ẩn danh mục khi danh mục chưa bị xóa mềm -->
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST" style="display:inline-block;"
                                                onsubmit="return confirm('Are you sure you want to hide this category ❓');">
                                                @csrf
                                                @method('DELETE') <!-- Use DELETE -->
                                                <button class="btn btn-success" type="submit"
                                                    style="border:none; background-color:#ccffcc; padding:7px; border-radius:5px;">
                                                    <i class="fas fa-eye" style="color:green; font-size:20px;"></i>
                                                    <!-- Icon for restoring category -->
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.categories.forceDestroy', $category->id) }}"
                                            method="POST" style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this category ❓');">
                                            @csrf
                                            @method('DELETE') <!-- Use DELETE -->
                                            <button class="btn btn-danger" type="submit"
                                                style="border:none; background-color:red; padding:7px; border-radius:5px;">
                                                <i class="fas fa-trash" style="color:black; font-size:20px;"></i>
                                                <!-- Icon for deleting -->
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Pagination --}}
                    
                </div>
            </div>
        </div>

    </div>
@endsection
