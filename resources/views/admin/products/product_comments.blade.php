@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1>Comments for {{ $product->product_name }}</h1>

        @if ($comments->isEmpty())
            <p>No comments available for this product.</p>
        @else
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $index => $comment)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><strong>{{ $comment->user->fullname }}</strong></td>
                                        <td>{{ $comment->content }}</td>
                                        <td>
                                            {{ $comment->created_at ? $comment->created_at : 'Date not available' }}
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this comment ❓');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" style="border:none; background-color:red; padding:7px; border-radius:5px;">
                                                    <i class="fas fa-trash" style="color:white; font-size:20px;"></i>
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
        @endif
    </div>
@endsection
