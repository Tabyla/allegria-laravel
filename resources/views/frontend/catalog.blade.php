@extends('frontend.layouts.app')
@section('title', 'Каталог')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}?v={{ time() }}">
@endsection
@section('content')
    <section class="container catalog-block">
        <div class="categories">
            @foreach ($categories as $category)
                <div class="box">
                    <div id="{{ $category->id }}" class="label">{{ $category->name }}</div>
                    <div class="content">
                        @foreach ($category->children as $child)
                            <a href="{{ route('category.show', $child->alias) }}"
                               class="subcategory">{{ $child->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="catalog-products">
            <h1>
                @if (isset($categoryName))
                    {{ $categoryName }}
                @else
                    Все товары
                @endif
            </h1>
            <div class="filtration">
                <form id="filter-form" action="{{ request()->routeIs('category.show') ?
                            route('category.show', ['alias' => request('alias')]) : route('catalog') }}" method="GET">
                    <input type="hidden" name="size_name" id="size_name" value="{{ request('size_name') }}">
                    <input type="hidden" name="color_name" id="color_name" value="{{ request('color_name') }}">
                    <input type="hidden" name="brand_name" id="brand_name" value="{{ request('brand_name') }}">

                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle">Размер</button>
                        <div class="dropdown-menu" id="size-dropdownMenu">
                            @foreach($properties as $property)
                                @if($property->name == 'Размер')
                                    @foreach($property->propertyValue as $value)
                                        <div data-name="{{ $value->name }}"
                                             class="dropdown-content size-option">{{ $value->name }}</div>
                                    @endforeach
                                @endif
                            @endforeach
                            <button type="button" class="apply-filter" data-property="size">применить</button>
                            <button type="button" class="cancel-filter" id="cancel-size-filter">Отменить</button>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle">Цвет</button>
                        <div class="dropdown-menu" id="color-dropdownMenu">
                            @foreach($properties as $property)
                                @if($property->name == 'Цвет')
                                    @foreach($property->propertyValue as $value)
                                        <div data-name="{{ $value->name }}"
                                             class="dropdown-content color-option">{{ $value->name }}</div>
                                    @endforeach
                                @endif
                            @endforeach
                            <button type="button" class="apply-filter" data-property="color">Применить</button>
                            <button type="button" class="cancel-filter" id="cancel-color-filter">Отменить</button>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle">Бренд</button>
                        <div class="dropdown-menu" id="brand-dropdownMenu">
                            @foreach($brandList as $brand)
                                <div class="brand-dropdown-content brand-option"
                                     data-name="{{ $brand->name }}">{{ $brand->name }}</div>
                            @endforeach
                            <button type="button" class="apply-filter" data-property="brand">Применить</button>
                            <button type="button" class="cancel-filter" id="cancel-brand-filter">Отменить</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="sort">
                <p id="product-count" class="product-count">{{ $productsCount }}</p>
                <div class="sorting">
                    <p>Сортировать:</p>
                    <select name="sort" id="sort">
                        <option value="">Выберите...</option>
                        <option value="newest">Новинки</option>
                        <option value="price_asc">По возрастанию цены</option>
                        <option value="price_desc">По убиванию цены</option>
                    </select>
                </div>
            </div>
            <div class="products" id="product-list">
                @foreach ($products as $product)
                    <div class="product">
                        <a href="{{ route('product.index', ['alias' => $product->alias]) }}">
                            <div class="content-img">
                                <img loading="lazy" src="{{ asset('images/products/' . $product->image_path) }}"
                                     alt="{{ $product->product_name }}">
                                @auth()
                                    @if(!in_array($product->id, $favorites))
                                        <form action="{{ route('favorites.add', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="image" src="{{asset('images/add_favourites.png')}}"
                                                   alt="add favourites" class="favoriteAdd">
                                        </form>
                                        <form action="{{route('cart.add', $product->id)}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="image" class="cartAdd" src="{{asset('images/add_cart.png')}}"
                                                   alt="add cart">
                                        </form>
                                    @else
                                        <form action="{{ route('favorites.remove', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="image" src="{{asset('images/favourites-select.png')}}"
                                                   alt="add favourites" class="favoriteAdd">
                                        </form>
                                        <form action="{{route('cart.add', $product->id)}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="image" class="cartAdd" src="{{asset('images/add_cart.png')}}"
                                                   alt="add cart">
                                        </form>
                                    @endif
                                    @if ($cart->has($product->id))
                                        <form action="{{ route('favorites.add', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="image" src="{{asset('images/add_favourites.png')}}"
                                                   alt="add favourites" class="favoriteAdd">
                                        </form>
                                        <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="image" class="cartAdd"
                                                   src="{{asset('images/cart-select.png')}}"
                                                   alt="add cart">
                                        </form>
                                    @endif
                                    @if ($cart->has($product->id) && in_array($product->id, $favorites))
                                        <form action="{{ route('favorites.remove', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="image" src="{{asset('images/favourites-select.png')}}"
                                                   alt="add favourites" class="favoriteAdd">
                                        </form>
                                        <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="image" class="cartAdd"
                                                   src="{{asset('images/cart-select.png')}}"
                                                   alt="add cart">
                                        </form>
                                    @endif
                                @else
                                    <input type="image" src="{{asset('images/add_favourites.png')}}"
                                           alt="add favourites"
                                           class="openAuthModal favoriteAdd">
                                    <input type="image" src="{{asset('images/add_cart.png')}}" alt="add cart"
                                           class="openAuthModal cartAdd">
                                @endauth
                            </div>
                        </a>
                        <a href="{{ route('product.index', ['alias' => $product->alias]) }}">
                            <h2 class="name">{{ $product->product_name }}</h2></a>
                        <p class="category">{{ $product->brand_name }}</p>
                        <p class="price">{{ $product->price }} руб</p>
                    </div>
                @endforeach
            </div>
            <div class="show-more">
                @if ($products->hasMorePages())
                    <input type="button" class="submit_btn" value="Показать больше" id="load-more">
                @endif
            </div>
        </div>
    </section>
    <script>
        const currentUrl = '{{ url()->current() }}';
        const sort = document.getElementById('sort');
        const sizeName = "{{ request('size_name') }}";
        const colorName = "{{ request('color_name') }}";
        const brandName = "{{ request('brand_name') }}";

        sort.addEventListener('change', function () {
            const sortValue = this.value;
            if (sizeName || colorName || brandName) {
                const url = currentUrl + '?size_name=' + sizeName + '&color_name=' + colorName + '&brand_name=' + brandName + "&sort=" + sortValue;
                window.location.href = url;
            } else {
                window.location.href = currentUrl + '?sort=' + sortValue;
            }
            sort.value = sortValue;
        });

        function getParameterByName(name) {
            const url = new URL(window.location.href);
            return url.searchParams.get(name);
        }

        const sortValue = getParameterByName('sort');

        if (sortValue) {
            sort.value = sortValue;
        }
    </script>
    <script src="{{ asset('js/catalog.js') }}?v={{ time() }}"></script>
@endsection
