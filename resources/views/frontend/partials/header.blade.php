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
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ route('profile') }}"><img src="{{asset('images/profile.png')}}"
                                                              alt="profile img"></a>
                    @else
                        <a href="{{ route('profile') }}"><img src="{{asset('images/profile.png')}}"
                                                        alt="profile img"></a>
                    @endif
                @else
                    <button id="openAuthModal"><img src="{{asset('images/profile.png')}}"
                                                    alt="profile img"></button>
                @endauth
                <a href="wishlist.html"><img src="{{asset('images/favourites.png')}}" alt="favourites img"></a>
                <a href="cart.html"><img src="{{asset('images/cart.png')}}" alt="cart img"></a>
            </div>
        </div>
    </nav>
</header>
