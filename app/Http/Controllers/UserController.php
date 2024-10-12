<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function edit(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {
            // Xử lý cập nhật thông tin khi có yêu cầu POST
            $data = $request->validate([
                'username'  => 'required|max:255|unique:users,username,' . $user->id,
                'fullname'  => 'required|max:255',
                'image'     => 'nullable|image|max:2048',
                'email'     => 'required|email|unique:users,email,' . $user->id,
                'phone'     => 'nullable|string|max:20',
                'address'   => 'nullable|string|max:255',
            ]);

            try {
                if ($request->hasFile('image')) {
                    $data['image'] = Storage::put('users', $request->file('image'));
                }

                $user->update($data);

                return back()->with('success', 'Cập nhật thông tin thành công.');
            } catch (\Throwable $th) {
                if (!empty($data['image']) && Storage::exists($data['image'])) {
                    Storage::delete($data['image']);
                }

                return back()->with('error', 'Cập nhật thông tin thất bại: ' . $th->getMessage());
            }
        }

        // Hiển thị form chỉnh sửa thông tin tài khoản
        return view('client.user', compact('user'));
    }

    // Đổi mật khẩu
    public function changePassword(Request $request)
    {
        $user = Auth::user();
    
        $data = $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:8|confirmed',
        ]);
    
        // Check current password
        if (!Hash::check($data['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
    
        try {
            // Update password
            $user->update(['password' => Hash::make($data['new_password'])]);
            return back()->with('success', 'Password has been successfully changed.');
        } catch (\Throwable $th) {
            return back()->with('error', 'An error occurred, please try again later.')->withInput();
        }
    }
    

    public function showChangePasswordForm()
    {
        return view('client.change_password'); // Đảm bảo bạn đã tạo view này
    }

    const PATH_VIEW = 'admin.users.';

    public function index()
    {
        // Lấy ra tất cả người dùng, bao gồm cả những người dùng đã bị xóa mềm
        $data = User::withTrashed()->latest()->paginate(10);
        return view(self::PATH_VIEW . 'index', compact('data'));
    }
    



    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => 'required|in:0,1', // Sử dụng 0 và 1 thay vì user và admin
        ]);

        try {
            $user->update($data);
            return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    public function restore($id)
    {
        try {
            User::withTrashed()->findOrFail($id)->restore();
            return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }
}
