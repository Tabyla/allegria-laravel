<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <title>Популярные вопросы</title>
</head>
<body>
@extends('frontend.layouts.app')
<main>
    @section('content')
        <section class="container catalog-block">
            <div class="categories">
                @foreach ($categories as $category)
                    <div class="box">
                        <div id="{{ $category->id }}" class="label">{{ $category->name }}</div>
                        <div class="content">
                            @foreach ($category->children as $child)
                                <a href="{{ route('category.show', $child->alias) }}" class="subcategory">{{ $child->name }}</a>
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
                    @foreach($properties as $property)
                        <div class="dropdown">
                            <button class="dropdown-toggle">{{ $property->name }}</button>
                            <div class="dropdown-menu" id="dropdownMenu">
                                @foreach($property->propertyValue as $value)
                                    <div data-id="{{ $value->id }}" class="dropdown-content">{{ $value->name }}</div>
                                @endforeach
                                <button>применить</button>
                            </div>
                        </div>
                    @endforeach
                    <div class="dropdown">
                        <button class="dropdown-toggle">Бренд</button>
                        <div class="dropdown-menu" id="dropdownMenu">
                            @foreach($brandList as $brand)
                                <div class="brand-dropdown-content">{{ $brand->name }}</div>
                            @endforeach
                            <button>применить</button>
                        </div>
                    </div>
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
                            <div class="content-img">
                                <img loading="lazy" src="{{ asset('images/products/' . $product->image_path) }}"
                                     alt="{{ $product->product_name }}">
                                <input type="image" src="{{asset('images/add_favourites.png')}}" alt="add favourites">
                            </div>
                            <h2 class="name">{{ $product->product_name }}</h2>
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
        </script>
        <script src="{{ asset('js/catalog.js') }}?v={{ time() }}"></script>
    @endsection
</main>
</body>
</html>
