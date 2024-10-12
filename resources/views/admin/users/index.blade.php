@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
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

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role == 1 ? 'Admin' : 'User' }}</td>
                                    <td>
                                        <a href="#editModal{{ $user->id }}" class="btn btn-warning" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        @if ($user->trashed())
                                            <!-- Nút khôi phục khi người dùng đã bị xóa mềm -->
                                            <form action="{{ route('admin.users.restore', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to restore this user ❓');">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-danger" type="submit" style="border:none; background-color:#ffcccc; padding:7px; border-radius:5px;">
                                                    <i class="fas fa-eye-slash" style="color:brown; font-size:20px;"></i>
                                                </button>
                                            </form>
                                        @else
                                            <!-- Nút ẩn người dùng khi người dùng chưa bị xóa mềm -->
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to hide this user ❓');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-success" type="submit" style="border:none; background-color:#ccffcc; padding:7px; border-radius:5px;">
                                                    <i class="fas fa-eye" style="color:green; font-size:20px;"></i>
                                                </button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>

                                <!-- Modal Edit User -->
                                <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <select name="role" class="form-control" id="role">
                                                            <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>User</option>
                                                            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                                                        </select>
                                                    </div>
                                                  
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
@endsection
