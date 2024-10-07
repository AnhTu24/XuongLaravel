@extends('client.layouts.master')

@section('content')
    <main class="main">
        <section class="home section--lg">
            <div class="home__container container grid">
                <div class="home__content">
                    <span class="home__subtitle">Hot promotions</span>
                    <h1 class="home__title">Fashion Trending
                        <span>Greate Collection</span>
                    </h1>
                    <p class="home__description">Save more with coupons & up to 20% off</p>
                    <a href="{{ route('client.shop') }}" class="btn">Shop Now</a>
                </div>

                <img src="client/assets/img/home-img.png" alt="" class="home__img">
            </div>
        </section>


        <section class="products section container">
            <div class="tab__btns">
                <span class="tab__btn active-tab">Latest</span>

            </div>

            <div class=" tab__items">
                <div class="tab__item active-tab">
                    <div class="products__container grid">
                        @foreach ($latestProducts as $latestProduct)
                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="{{ route('client.detail',$latestProduct['id']) }}" class="product__imgaes">
                                        <img src="{{ $latestProduct['image'] }}" alt=""
                                            class="product__img defaule">
                                    </a>
                                    @if ($latestProduct['discount'] > 0)
                                    <div class="product__badge light-pink">{{ $latestProduct['discount'] . '%' }}</div>
                                @endif
                                </div>

                                <div class="product_content">
                                    <a href="{{ route('client.detail',$latestProduct['id']) }}">
                                        <h3 class="product__title">{{ $latestProduct['product_name'] }}</h3>
                                    </a>

                                    <div class="product__price flex">
                                        @if ($latestProduct['new_price'] == $latestProduct['old_price'])
                                            <span
                                                class="new__price">${{ number_format($latestProduct['new_price'], 2) }}</span>
                                        @else
                                            <span
                                                class="new__price">${{ number_format($latestProduct['new_price'], 2) }}</span>
                                            <span
                                                class="old__price">${{ number_format($latestProduct['old_price'], 2) }}</span>
                                        @endif
                                    </div>


                                    <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="fa-solid fa-shop"></i>
                                    </a>
                                </div>

                            </div>
                        @endforeach



                    </div>
                </div>

                <div class="tab__item">
                    <div class="products__container grid">
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-9-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-9-2.jpg" alt="" class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-5-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-5-2.jpg" alt="" class="product__img hover">
                                </a>



                                <div class="product__badge light-green">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-3-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-3-2.jpg" alt="" class="product__img hover">
                                </a>



                                <div class="product__badge light-orange">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-4-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-4-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-blue">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-5-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-5-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">-30%</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-6-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-6-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">-22%</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-7-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-7-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-green">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-8-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-8-2.jpg" alt=""
                                        class="product__img hover">
                                </a>


                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="tab__item">
                    <div class="products__container grid">
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-6-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-6-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-2-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-2-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-green">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-3-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-3-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-orange">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-4-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-4-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-blue">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-5-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-5-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">-30%</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-6-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-6-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">-22%</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-7-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-7-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-green">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-8-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-8-2.jpg" alt=""
                                        class="product__img hover">
                                </a>


                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>

        <section class="products section container">
            <div class="tab__btns">
                <span class="tab__btn active-tab">Hot</span>

            </div>

            <div class=" tab__items">
                <div class="tab__item active-tab">
                    <div class="products__container grid">
                        @foreach ($hotProducts as $hotProducts)
                            <div class="product__item">

                                <div class="product__banner">
                                    <a href="{{ route('client.detail',$hotProducts['id']) }}" class="product__imgaes">
                                        <img src="{{ $hotProducts['image'] }}" alt=""
                                            class="product__img defaule">
                                    </a>
                                    @if ($hotProducts['discount'] > 0)
                                        <div class="product__badge light-pink">{{ $hotProducts['discount'] . '%' }}</div>
                                    @endif
                                </div>

                                <div class="product_content">
                                    <a href="{{ route('client.detail',$hotProducts['id']) }}">
                                        <h3 class="product__title">{{ $hotProducts['product_name'] }}</h3>
                                    </a>

                                    <div class="product__price flex">
                                        @if ($hotProducts['new_price'] == $hotProducts['old_price'])
                                            <span
                                                class="new__price">${{ number_format($hotProducts['new_price'], 2) }}</span>
                                        @else
                                            <span
                                                class="new__price">${{ number_format($hotProducts['new_price'], 2) }}</span>
                                            <span
                                                class="old__price">${{ number_format($hotProducts['old_price'], 2) }}</span>
                                        @endif
                                    </div>


                                    <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="fa-solid fa-shop"></i>
                                    </a>
                                </div>

                            </div>
                        @endforeach



                    </div>
                </div>

                <div class="tab__item">
                    <div class="products__container grid">
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-9-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-9-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-5-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-5-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-green">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-3-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-3-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-orange">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-4-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-4-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-blue">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-5-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-5-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">-30%</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-6-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-6-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">-22%</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-7-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-7-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-green">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-8-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-8-2.jpg" alt=""
                                        class="product__img hover">
                                </a>


                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="tab__item">
                    <div class="products__container grid">
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-6-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-6-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-2-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-2-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-green">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-3-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-3-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-orange">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-4-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-4-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-blue">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-5-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-5-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">-30%</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-6-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-6-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-pink">-22%</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-7-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-7-2.jpg" alt=""
                                        class="product__img hover">
                                </a>



                                <div class="product__badge light-green">Hot</div>
                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="  " class="product__imgaes">
                                    <img src="client/assets/img/product-8-1.jpg" alt=""
                                        class="product__img defaule">

                                    <img src="client/assets/img/product-8-2.jpg" alt=""
                                        class="product__img hover">
                                </a>


                            </div>

                            <div class="product_content">
                                <span class="product__category">Clothing</span>
                                <a href="  ">
                                    <h3 class="product__title">Colorful Pattern Shirts</h3>
                                </a>

                                <div class="product__price flex">
                                    <span class="new__price">$238.85</span>
                                    <span class="old__price">$240.8</span>
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
                                    <i class="fa-solid fa-shop"></i>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>

        <section class="deals section">
            <div class="deals__container container grid">
                <div class="deals__item">
                    <div class="deals__group">
                        <h3 class="deals__brand">Deal of the Day</h3>
                        <span class="deals__category">Limited quantitines</span>
                    </div>

                    <h4 class="deals_title">Summer Collection New Morden Design</h4>

                    <div class="deals__price flex">
                        <span class="new__price">$150.000</span>
                        <span class="old__price">$200.000</span>
                    </div>

                    <div class="deals__group">
                        <p class="deals__countdown-text">Hurry Up! Offer End In:</p>
                        <div class="countdown">
                            <div class="countdown__amount">
                                <p class="countdown__period">02</p>
                                <span class="unit">Days</span>
                            </div>

                            <div class="countdown__amount">
                                <p class="countdown__period">22</p>
                                <span class="unit">Hours</span>
                            </div>

                            <div class="countdown__amount">
                                <p class="countdown__period">57</p>
                                <span class="unit">Mins</span>
                            </div>

                            <div class="countdown__amount">
                                <p class="countdown__period">24</p>
                                <span class="unit">Sec</span>
                            </div>

                        </div>
                    </div>

                    <div class="deals__btn">
                        <a href="  " class="btn btn--md">Shop Now</a>
                    </div>
                </div>

                <div class="deals__item">
                    <div class="deals__group">
                        <h3 class="deals__brand">Men Clothing</h3>
                        <span class="deals__category">Limited quantitines</span>
                    </div>

                    <h4 class="deals_title">Try something new on vacation</h4>

                    <div class="deals__price flex">
                        <span class="new__price">$150.000</span>
                        <span class="old__price">$200.000</span>
                    </div>

                    <div class="deals__group">
                        <p class="deals__countdown-text">Hurry Up! Offer End In:</p>
                        <div class="countdown">
                            <div class="countdown__amount">
                                <p class="countdown__period">02</p>
                                <span class="unit">Days</span>
                            </div>

                            <div class="countdown__amount">
                                <p class="countdown__period">22</p>
                                <span class="unit">Hours</span>
                            </div>

                            <div class="countdown__amount">
                                <p class="countdown__period">57</p>
                                <span class="unit">Mins</span>
                            </div>

                            <div class="countdown__amount">
                                <p class="countdown__period">24</p>
                                <span class="unit">Sec</span>
                            </div>

                        </div>
                    </div>

                    <div class="deals__btn">
                        <a href="  " class="btn btn--md">Shop Now</a>
                    </div>
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
