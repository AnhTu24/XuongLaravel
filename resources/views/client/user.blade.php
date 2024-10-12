@extends('client.layouts.master')

@section('content')
<section class="login-register section--lg">
    <div class="login-register__container formlogin container box_login">
        <div class="login bl_r">
            <h3 class="section__title">Tài khoản của tôi</h3>

            <form action="{{ route('user.edit') }}" method="post" class="form grid" enctype="multipart/form-data">
                @csrf
                <!-- Hiển thị hình ảnh người dùng -->
                <img style="width:100px;height:100px;border-radius:50%;object-fit:cover;" src="{{ $user->image ? asset('storage/' . $user->image) : asset('default-avatar.png') }}" alt=""><br>
                <input type="file" class="form__input" name="image">
                @error('image')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- Tên đăng nhập -->
                <input type="text" placeholder="Tên đăng nhập" class="form__input" name="username" value="{{ old('username', $user->username) }}">
                @error('username')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- Email -->
                <input type="email" placeholder="Email" class="form__input" name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- Họ và tên -->
                <input type="text" placeholder="Họ và tên" class="form__input" name="fullname" value="{{ old('fullname', $user->fullname) }}">
                @error('fullname')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- Số điện thoại -->
                <input type="text" placeholder="Số điện thoại" class="form__input" name="phone" value="{{ old('phone', $user->phone) }}">
                @error('phone')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- Địa chỉ -->
                <input type="text" placeholder="Địa chỉ" class="form__input" name="address" value="{{ old('address', $user->address) }}">
                @error('address')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- Nút Cập nhật -->
                <div class="form__btn btnlogin">
                    <input type="submit" class="btn btnw" value="Cập nhật" name="capnhat">
                </div>
            </form><br>

            <!-- Hiển thị thông báo -->
            @if (session('success'))
                <div class="text-orange-500 font-semibold">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="text-red-500 font-semibold">{{ session('error') }}</div>
            @endif
        </div>
    </div>
</section>

@endsection