@extends('client.layouts.master')

@section('content')
<main class="main">

    <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
            <li><a href="index.html" class="breadcrumb__link">Home</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Reset Password</span></li>
        </ul>
    </section>

    <section class="login-register section--lg">
        <div class="login-register__container container">
            <div class="login">
                <h3 class="section__title">Reset Password</h3>

                <form method="POST" action="{{ route('password.update') }}" class="form grid">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <input id="email" type="email" name="email" placeholder="Your Email"
                        class="form__input @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" name="password" placeholder="New Password"
                        class="form__input @error('password') is-invalid @enderror" required
                        autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm New Password"
                        class="form__input" required autocomplete="new-password">

                    <div class="form__btn">
                        <button type="submit" class="btn">Reset Password</button>
                    </div>
                </form>
            </div>

        </div>
    </section>

</main>
@endsection
