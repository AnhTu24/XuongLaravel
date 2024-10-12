@extends('client.layouts.master')

@section('content')
<section class="login-register section--lg">
    <div class="login-register__container formlogin container box_login">
        <div class="login bl_r">
            <h3 class="section__title">Change Password</h3>

            <form action="{{ route('user.change_password') }}" method="post" class="form grid">
                @csrf

                <!-- Current Password -->
                <input type="password" placeholder="Current Password" class="form__input" name="current_password">
                @error('current_password')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- New Password -->
                <input type="password" placeholder="New Password" class="form__input" name="new_password">
                @error('new_password')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- Confirm New Password -->
                <input type="password" placeholder="Confirm New Password" class="form__input" name="new_password_confirmation">
                @error('new_password_confirmation')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <!-- Change Password Button -->
                <div class="form__btn btnlogin">
                    <input type="submit" class="btn btnw" value="Change Password" name="doitmk">
                </div>
            </form><br>

            <!-- Display Messages -->
            @if (session('success'))
                <div class="text-orange-500 font-semibold">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="text-red-500 font-semibold">{{ session('error') }}</div>
            @endif
        </div>
    </div>
</section>
@endsection
