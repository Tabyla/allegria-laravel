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
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <title>Избранные товары</title>
</head>
<body>
@extends('frontend.layouts.app')
<main>
    @section('content')
        <section class="wishlist">
            <div class="products-block">
                <div class="product-row">
                    @foreach($favorites as $product)
                        <div class="product">
                            <form action="{{ route('favorites.remove', $product->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="list-delete"><img
                                        src="{{asset('images/close.png')}}" alt="delete">
                                </button>
                            </form>
                            <img src="{{ asset('images/products/' . $product->image_path) }}"
                                 alt="{{ $product->product_name }}"
                                 class="product-image">
                            <div class="product-info">
                                <div class="product-content">
                                    <h4 class="name">{{$product->product_name}}</h4>
                                    <p class="category">{{$product->category_name}}</p>
                                    <p class="cost">{{$product->price}} Руб.</p>
                                </div>
                                <button class="list-btn">Добавить в корзину</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection
</main>
</body>
</html>
