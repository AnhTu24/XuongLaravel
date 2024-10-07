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
      <div class="login-register__container container grid">
        <div class="login">
          <h3 class="section__title">Login</h3>

          <form action="" class="form grid">
            <input type="email" placeholder="Your Email" class="form__input">
            <input type="password" placeholder="Your Password" class="form__input">
            <div class="form__btn">
              <button class="btn">Login</button>
            </div>
          </form>
        </div>

      </div>
    </section>

  </main>
@endsection