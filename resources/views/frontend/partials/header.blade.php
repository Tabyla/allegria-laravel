<header>
    <nav class="container">
        <div>
            <a href="{{ route('/') }}">
                <img src="{{asset('images/logo.png')}}" alt="logo img"/>
            </a>
        </div>
        <div class="nav__links">
            <a href="{{ route('catalog') }}" class="catalog">Каталог</a>
            <div class="nav-icon-links">
                <button id="openAuthModal"><img src="{{asset('images/profile.png')}}" alt="profile img"></button>
                <a href="wishlist.html"><img src="{{asset('images/favourites.png')}}" alt="favourites img"></a>
                <a href="cart.html"><img src="{{asset('images/cart.png')}}" alt="cart img"></a>
            </div>
        </div>
    </nav>
</header>
