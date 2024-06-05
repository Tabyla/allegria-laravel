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
                @auth
                    <a href="{{ route('profile') }}"><img src="{{asset('images/profile.png')}}"
                                                          alt="profile img"></a>
                    <a href="{{ route('favorites') }}"><img src="{{asset('images/favourites.png')}}"
                                                            alt="favourites img"></a>
                @else
                    <button class="openAuthModal"><img src="{{asset('images/profile.png')}}"
                                                    alt="profile img"></button>
                    <button class="openAuthModal"><img src="{{asset('images/favourites.png')}}"
                                                    alt="favourites img"></button>
                @endauth
                <a href="cart.html"><img src="{{asset('images/cart.png')}}" alt="cart img"></a>
            </div>
        </div>
    </nav>
</header>
