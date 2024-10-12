@extends('client.layouts.master')

@section('content')

<main class="main">
    <section class="breadcrumb">
      <ul class="breadcrumb__list flex container">
        <li><a href="index.html" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><a href="{{ route('client.shop') }}" class="breadcrumb__link">Shop</a></li>
      </ul>
    </section>
    <section class="products section--lg container">


      <div class="products__container grid">
        @foreach ($products as $product)
            <div class="product__item">

                <div class="product__banner">
                    <a href="{{ route('client.detail',$product->id) }}" class="product__imgaes">
                        <img src="{{ Storage::url($product['image']) }}" alt=""
                            class="product__img" onmouseout="imgOut()" onmouseover="imgOver()">
                    </a>
                    <div class="product__badge light-pink">Hot</div>
                </div>

                <div class="product_content">
                    <span class="product__category">{{ $product['category_name'] }}</span>
                    <a href="  ">
                        <h3 class="product__title">{{ $product['product_name'] }}</h3>
                    </a>

                    <div class="product__price flex">
                        @if ($product['new_price'] == $product['old_price'])
                            <span
                                class="new__price">${{ number_format($product['new_price'], 2) }}</span>
                        @else
                            <span
                                class="new__price">${{ number_format($product['new_price'], 2) }}</span>
                            <span
                                class="old__price">${{ number_format($product['old_price'], 2) }}</span>
                        @endif
                    </div>


                    <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                        <i class="fa-solid fa-shop"></i>
                    </a>
                </div>

            </div>
        @endforeach



    </div>

      <ul class="pagination">
        {{ $products->links('vendor.pagination.default') }}
      </ul>
    </section>
    <section class="newsletter section">
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