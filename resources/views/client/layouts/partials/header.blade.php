<div class="header__top">
    <div class="header__container container">
        <div class="header__contact">
            <span>+84 683 313 294</span>
            <span>Vietnam</span>
        </div>
        <p class="header__alert-news">
        </p>
        @if (Auth::check())
            <div class="header__top-user" style="position: relative;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span>{{ Auth::user()->fullname }}</span>
                    <img src="{{ Storage::url(Auth::user()->image) ?? 'default_image_path.jpg' }}"
                        style="width:35px;height:35px;border-radius: 50%; object-fit: cover;" alt="{{ Auth::user()->username }}"
                        class="user-image" onclick="toggleDropdown()">
                </div>
                <!-- Dropdown container -->
                <div id="userDropdown" class="dropdown__content" style="display: none; position: absolute; top: 100%;">

                    <a href="{{ route('user.edit', Auth::user()->id) }}" class="header__top-action dropdown__link"
                        style="white-space: nowrap;">
                        <i class="fas fa-user-edit"></i> Edit Profile
                    </a>

                    <a href="{{ route('user.change_password') }}" class="header__top-action dropdown__link"
                        style="white-space: nowrap;">
                        <i class="fas fa-lock"></i> Change Password
                    </a>

                    @if (Auth::user()->role == 1)
                        <a href="{{ route('admin.dashboard') }}" class="header__top-action dropdown__link"
                            style="white-space: nowrap;">
                            <i class="fas fa-tachometer-alt"></i> Admin Action
                        </a>
                    @endif

                    <hr>

                    <form id="logout-form" class="dropdown__link" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="header__top-action dropdown__link">
                            <i class="fas fa-sign-out-alt"></i> Log out
                        </button>
                    </form>

                </div>

            </div>
        @else
            <a href="{{ route('login') }}" class="header__top-action">
                <i class="fas fa-user"></i> Log in
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
                <a href="{{ route('client.shop') }}" class="nav__link">Shop</a>
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

        <a href="" class="header__action-btn">
            <img src="/client/assets/img/icon-cart.svg" alt="">
            <span class="count">3</span>
        </a>

        <div class="header__action-btn nav__toggle" id="nav-toggle">
            <img src="/client/assets/img/menu-burger.svg" alt="">
        </div>
    </div>

</nav>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('userDropdown');
        if (dropdown.style.display === "none") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    }

    // Optional: Close dropdown if user clicks outside
    window.onclick = function(event) {
        if (!event.target.matches('.user-image')) {
            var dropdown = document.getElementById('userDropdown');
            if (dropdown && dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    }

    window.onload = function() {
    var dropdown = document.getElementById('userDropdown');
    if (dropdown) {
        dropdown.style.display = "none"; // Đảm bảo dropdown không hiển thị
    }
};
</script>
