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
                    <h3 class="section__title">Login</h3>

                    <form method="POST" action="{{ route('login') }}" class="form grid">
                        @csrf
                        <input id="email" type="email" name="email" placeholder="Your Email"
                            class="form__input @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" name="password" placeholder="Your Password"
                            class="form__input @error('password') is-invalid @enderror" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="form__btn">
                            <button type="submit" class="btn">Login</button>
                        </div>
                        <div class="form__btn">
                            @if (Route::has('password.request'))
                                <a style="color: hsl(176, 88%, 27%)" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="mt-3">
                            <span>Don't have an account? <a href="{{ route('register') }}" style="color: hsl(176, 88%, 27%)" class="link">Register here</a></span>
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
