<div class="header__top">
    <div class="header__container container">
        <div class="header__contact">
            <span>+84 683 313 294</span>
            <span>Our location</span>
        </div>
        <p class="header__alert-news">
        </p>
        @if (Auth::check())
        <div class="header__top-user">
            <img src="{{ Auth::user()->image }}" alt="{{ Auth::user()->fullname }}" class="user-image">
            <span class="username">{{ Auth::user()->username }}</span>
        </div>
    @else
        <a href="{{ route('login') }}" class="header__top-action">
            Log In / Sign Up
        </a>
    @endif
    
    </div>
</div>

<nav class="nav container">
    <a href="/" class="nav__logo">
        <img src="/client/assets/img/logo.svg" alt="" class="nav__logo-img">
    </a>

    <div class="nav__menu" id="nav-menu">
        <div class="nav__menu-top">
            <a href="/" class="nav__menu-logo">
                <img src="client/assets/img/logo.svg" alt="">
            </a>

            <div class="nav__close" id="nav-close">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
        </div>

        <ul class="nav__list">
            <li class="nav__item">
                <a href="/" class="nav__link active-link">Home</a>
            </li>

            <li class="nav__item">
                <a href="{{ route('client.shop')}}" class="nav__link">Shop</a>
                <div class="dropdown__content">
                    @foreach ($categories as $category)
                        <a href="{{ route('client.shop', ['category' => $category->id]) }}" class="dropdown__link">
                            {{ $category->category_name }}
                        </a>
                    @endforeach
                </div>
            </li>
            



            <li class="nav__item">
                <a href="accounts.html" class="nav__link">News</a>
            </li>

            <li class="nav__item">
                <a href="accounts.html" class="nav__link">About us</a>
            </li>

        </ul>

        <div class="header__search">
            <form action="{{ route('client.shop') }}" method="GET">
                <input type="text" name="search" class="form__input" placeholder="Search for items..."
                    value="{{ request()->input('search') }}">
                <button type="submit" class="search__btn">
                    <img src="client/assets/img/search.png" alt="">
                </button>
            </form>
        </div>
    </div>

    <div class="header__user--actions">
        <a href="wishlist.html" class="header__action-btn">
            <img src="/client/assets/img/icon-heart.svg" alt="">
            <span class="count">3</span>
        </a>

        <a href="{{ route('cart') }}" class="header__action-btn">
            <img src="/client/assets/img/icon-cart.svg" alt="">
            <span class="count">3</span>
        </a>

        <div class="header__action-btn nav__toggle" id="nav-toggle">
            <img src="/client/assets/img/menu-burger.svg" alt="">
        </div>
    </div>

</nav>
