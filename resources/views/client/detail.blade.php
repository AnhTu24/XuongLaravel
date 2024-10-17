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
                    <img src="{{ Storage::url($product['image']) }}" alt="" class="details__img" height="500px"
                        id="details">
                </div>

                <div class="details__group">
                    <h3 class="details__title">{{ $product->product_name }}</h3>
                    <p class="details__brand">Category: <a
                            href="{{ route('client.shop', ['category' => $product->category_id]) }}">
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
                        {{ $product->description }}
                    </p>



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

                    <form action="{{ route('addToCart', $product->id) }}" method="POST">
                        @csrf
                        <div class="details__action">
                            <input type="number" name="quantity" id="product-quanity" class="quantity" value="1">
                    
                            <!-- Thêm trường ẩn để lưu color -->
                            <input type="hidden" name="color" value="{{ $product->color }}">
                    
                            <!-- Thêm trường ẩn để lưu size -->
                            <input type="hidden" name="size" value="{{ $product->size }}">
                    
                            <button type="submit" class="btn btn-sm">Add to Cart</button>
                        </div>
                    </form>
                    
                </div>
            </div>

            <div class="details__container container grid">
                <div class="details__group">
                    <img src="{{ $product->image }}" alt="" class="details__img" id="details"
                        onmouseout="imgOut()" onmouseover="imgOver()">

                </div>
            </div>
        </section>

        <section class="details__tab container">
            <div class="detail__tabs">
                <span class="detail__tab active-tab">Comments</span>
            </div>


            <div class="details__tabs-content">
                <div class="details__tab-content active-tab" id="tab-content">
                    <div class="cart__comment">
                        @foreach ($comments as $comment)
                            <div class="comments">
                                <div class="comment">
                                    <div class="avatar">
                                        {{-- Replace with user avatar if available --}}
                                        <img style="avatar object-fit: cover;"
                                            src="{{ Storage::url($comment->user->image) ?? '/path/to/default/avatar.jpg' }}"
                                            alt="Avatar">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-header">
                                            <b class="username">{{ $comment->user->fullname }}</b>
                                            <span class="timestamp">{{ $comment->created_at }}</span>
                                        </div>
                                        <p class="comment-text">{{ $comment->content }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- Show the comment form if the user is logged in --}}
                        @if (Auth::check())
                            <form action="{{ route('comments.store') }}" method="POST" class="comment__form form grid">
                                @csrf
                                <div class="form__group">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input class="form__input" name="content" id="comments"
                                        placeholder="Write a comment..." required></input>
                                    <div class="form__btn">
                                        <button type="submit" id="btnsub" class="btn flex btn--sm">Submit
                                        </button>
                                    </div>
                                </div>
                                {{-- Error message if validation fails --}}
                                @if ($errors->has('content'))
                                    <span style="color:red">{{ $errors->first('content') }}</span>
                                @endif
                            </form>
                        @else
                            <div class="header__top-action">
                                <span>You need 
                                    <a href="{{ route('login') }}">
                                        log in
                                    </a>
                                     to comment</span>
                            </div>
                        @endif
                    </div>
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
                                <img src="{{ Storage::url($relatedProduct['image']) }}" alt="" class="product__img default">
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
