@extends('client.layouts.master')

@section('content')
<main class="main">

    <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
            <li><a href="index.html" class="breadcrumb__link">Home</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Login / Register</span></li>
        </ul>
    </section>

    <section class="login-register section--lg">
        <div class="login-register__container container">
            <div class="login">
                <h3 class="section__title">Register</h3>

                <form method="POST" action="{{ route('register') }}" class="form grid">
                    @csrf

                    <input id="username" type="text" name="username" placeholder="Your Username"
                        class="form__input @error('username') is-invalid @enderror" value="{{ old('username') }}" required
                        autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="fullname" type="text" name="fullname" placeholder="Your Full Name"
                        class="form__input @error('fullname') is-invalid @enderror" value="{{ old('fullname') }}" required
                        autocomplete="fullname">

                    @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="email" type="email" name="email" placeholder="Your Email"
                        class="form__input @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                        autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="phone" type="text" name="phone" placeholder="Your Phone (optional)"
                        class="form__input @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                        autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" name="password" placeholder="Your Password"
                        class="form__input @error('password') is-invalid @enderror" required
                        autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password"
                        class="form__input" required autocomplete="new-password">

                    <div class="form__btn">
                        <button type="submit" class="btn">Register</button>
                    </div>

                    <div class="mt-3">
                        <span>Already have an account? <a href="{{ route('login') }}" style="color: hsl(176, 88%, 27%)" class="link">Login here</a></span>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <section class="newsletter section home__newsletter">
        <div class="newsletter__container container grid">
            <h3 class="newsletter__title flex">
                <img src="client/assets/img/icon-email.svg" alt="" class="newsletter__icon">
                Sign up to Newsletter
            </h3>

            <p class="newsletter__description">
                ..and receive $25 coupon for first shopping
            </p>

            <form action="" class="newsletter__form">
                <input type="text" class="newsletter__input" placeholder="Enter your email">
                <button type="submit" class="newletter__btn">Subscribe</button>
            </form>
        </div>

    </section>
</main>
@endsection
