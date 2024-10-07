@extends('client.layouts.master')

@section('content')
    <main class="main">
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="/" class="breadcrumb__link">Home</a></li>
                <li><span class="breadcrumb__link">></span></li>
                <li><a href="{{ route('client.shop') }}" class="breadcrumb__link">Shop</a></li>
                <li><span class="breadcrumb__link">></span></li>
                <li><span class="breadcrumb__link">{{ $product->product_name }}</span></li>
            </ul>
        </section>
        <section class="details section--lg">
            <div class="details__container container grid ac">
                <div class="details__group">
                    <img src="{{ $product->image }}" alt="" class="details__img" height="550px" id="details">
                </div>

                <div class="details__group">
                    <h3 class="details__title">{{ $product->product_name }}</h3>
                    <p class="details__brand">Category: <a href="{{ route('client.shop', ['category' => $product->category_id]) }}">
                        {{ $product->category->category_name }}</a></p>

                    <div class="details__price flex">
                        <span class="new__price">
                            @if ($product && $product->discount > 0)
                                ${{ $product->price * (1 - $product->discount / 100) }}
                            @else
                                ${{ $product->price }}
                            @endif
                        </span>

                        @if ($product && $product->discount > 0)
                            <span class="old__price">${{ $product->price }}</span>
                            <span class="save__price">-{{ $product->discount }}%</span>
                        @endif
                    </div>

                    <p class="short__description">
                        {{ $product->discription }}
                    </p>

                    <ul class="product__list">
                        <li class="list__item flex">
                            <i class="fa-solid fa-crown"></i>1 Year AL Jazeera Brand Warranty
                        </li>

                        <li class="list__item flex">
                            <i class="fa-solid fa-arrows-rotate"></i>30 Day Return Policy
                        </li>

                        <li class="list__item flex">
                            <i class="fa-regular fa-credit-card"></i>Card on Delivery available
                        </li>
                    </ul>

                    <div class="details__color flex">
                        <span class="details__color-title">Color</span>
                        <ul class="color__list">
                            <li>
                                <a href="#" class="color__link" style="background-color: {{ $product->color }};"></a>
                            </li>
                        </ul>
                    </div>

                    <div class="details__size flex">
                        <span class="details__size-title">Size</span>
                        <ul class="size__list">
                            <li>
                                <a href="#" class="size__link {{ $product->size == 'S' ? 'size-active' : '' }}">
                                    {{ $product->size }}
                                </a>
                            </li>
                            <!-- Có thể thêm các kích thước khác nếu cần -->
                        </ul>
                    </div>

                    <div class="details__action">
                        <input type="number" name="" id="" class="quantity" value="3">
                        <a href="#" class="btn btn-sm">Add to Cart</a>
                        <a href="#" class="details__action-btn details__action-btn--color">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>

                    <ul class="details__meta">
                        <li class="meta__list flex"><span>SKU:</span> FWM15VKL</li>
                        <li class="meta__list flex"><span>Tags:</span> Cloth, Men, Dress</li>
                        <li class="meta__list flex"><span>Avaliability:</span> 8 Items In Stock</li>
                    </ul>
                </div>
            </div>

            <div class="details__container container grid">
                <div class="details__group">
                    <img src="{{ $product->image }}" alt="" class="details__img" id="details"
                        onmouseout="imgOut()" onmouseover="imgOver()">
                    <div class="details__small-images grid">
                        <img src="assets/img/product-8-2.jpg" alt="" class="details__small-img">
                        <img src="assets/img/product-8-1.jpg" alt="" class="details__small-img">
                        <img src="assets/img/product-8-2.jpg" alt="" class="details__small-img">
                    </div>
                </div>
            </div>
        </section>

        <section class="details__tab container">
            <div class="detail__tabs">
                <span class="detail__tab active-tab">Additional Info</span>
                <span class="detail__tab">Reviews(3)</span>
            </div>

            <div class="details__tabs-content">
                <div class="details__tab-content active-tab">
               
                </div>
            </div>
        </section>

        <section class="products container section--lg">
            <h3 class="section__title"><span>Related</span> Products</h3>
            <div class="products__container grid">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="product__item">
                        <div class="product__banner">
                            <a href="{{ route('client.detail', $relatedProduct->id) }}" class="product__images">
                                <img src="{{ $relatedProduct->image }}" alt="" class="product__img default">
                            </a>
                            @if ($relatedProduct->discount > 0)
                                <div class="product__badge light-pink">-{{ $relatedProduct->discount }}%</div>
                            @endif
                        </div>

                        <div class="product_content">
                           
                            <a href="#">
                                <h3 class="product__title">{{ $relatedProduct->product_name }}</h3>
                            </a>

                            <div class="product__price flex">
                                <span class="new__price">
                                    @if ($relatedProduct->discount > 0)
                                        ${{ $relatedProduct->price * (1 - $relatedProduct->discount / 100) }}
                                    @else
                                        ${{ $relatedProduct->price }}
                                    @endif
                                </span>

                                @if ($relatedProduct->discount > 0)
                                    <span class="old__price">${{ $relatedProduct->price }}</span>
                                @endif
                            </div>

                            <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                <i class="fa-solid fa-shop"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <section class="newsletter section">
            <div class="newsletter__container container grid">
                <h3 class="newsletter__title flex">
                    <img src="assets/img/icon-email.svg" alt="" class="newsletter__icon">
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
