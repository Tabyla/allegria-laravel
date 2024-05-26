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
                <div class="box">
                    <div class="label">Одежда</div>
                    <div class="content">
                        <button value="0" class="subcategory">Свитера</button>
                        <button value="0" class="subcategory">Толстовки</button>
                        <button value="0" class="subcategory">Платья</button>
                        <button value="0" class="subcategory">Юбки</button>
                        <button value="0" class="subcategory">Футболки и топы</button>
                        <button value="0" class="subcategory">Брюки и шорты</button>
                        <button value="0" class="subcategory">Рубашки</button>
                        <button value="0" class="subcategory">Комбинезоны</button>
                        <button value="0" class="subcategory">Леггинсы</button>
                    </div>
                </div>
                <div class="box">
                    <div class="label">Обувь</div>
                    <div class="content">
                        <button value="0" class="subcategory">Кроссовки</button>
                        <button value="0" class="subcategory">Шлепанцы</button>
                    </div>
                </div>
                <div class="box">
                    <div class="label">Сумки</div>
                    <div class="content">
                        <button value="0" class="subcategory">Сумки</button>
                        <button value="0" class="subcategory">Рюкзаки</button>
                        <button value="0" class="subcategory">Поясные</button>
                        <button value="0" class="subcategory">Спортивные</button>
                        <button value="0" class="subcategory">Шопперы</button>
                    </div>
                </div>
                <div class="box">
                    <div class="label">Аксессуары</div>
                    <div class="content">
                        <button value="0" class="subcategory">Головные уборы</button>
                        <button value="0" class="subcategory">Перчатки</button>
                        <button value="0" class="subcategory">Шарфы и платки</button>
                        <button value="0" class="subcategory">Носки</button>
                        <button value="0" class="subcategory">Гетры</button>
                    </div>
                </div>
            </div>
            <div class="catalog-products">
                <h1>Кофты и пиджаки</h1>
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
                        <select name="sorting" id="sorting">
                            <option>Новинки</option>
                            <option>По возрастанию цены</option>
                            <option>По убиванию цены</option>
                        </select>
                    </div>
                </div>
                <div class="products">
                    @foreach ($products as $product)
                        <div class="product">
                            <div class="content-img">
                                <img loading="lazy" src="{{ asset('images/' . $product->image_path) }}"
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
                    <input type="button" class="submit_btn" value="показать больше">
                </div>
            </div>
        </section>
        <script src="{{ asset('js/catalog.js') }}?v={{ time() }}"></script>
    @endsection
</main>
</body>
</html>
