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

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="form grid">
                    @csrf

                    <input id="email" type="email" name="email" placeholder="Your Email"
                        class="form__input @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form__btn">
                        <button type="submit" class="btn">Send Password Reset Link</button>
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
