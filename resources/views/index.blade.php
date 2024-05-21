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
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <title>Главная</title>
</head>
<body>
@extends('frontend.layouts.app')
<main>
    @section('content')
        <section>
            <swiper-container class="mySwiper" centered-slides="true" autoplay-delay="10000"
                              autoplay-disable-on-interaction="false">
                <swiper-slide>
                    <div class="first_banner">
                        <div class="first_banner_content">
                            <div class="first_banner_text">
                                <p class="brand_text">бренд</p>
                                <h1>american vintage</h1>
                            </div>
                            <a class="btn" href="#">Смотреть коллекцию</a>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="second_banner container">
                        <div class="second_banner_content">
                            <div class="banner_text">
                                <p class="brand_text">бренд</p>
                                <h1>george gina <br>lucy</h1>
                            </div>
                            <a class="red_btn" href="#">Смотреть коллекцию</a>
                        </div>
                        <img src="{{asset('images/banner-2.png')}}" alt="banner woman image">
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="third_banner container">
                        <div class="third_banner_content">
                            <div class="banner_text">
                                <p class="brand_text">бренд</p>
                                <h1>birkenstock</h1>
                            </div>
                            <a class="red_btn" href="#">Смотреть коллекцию</a>
                        </div>
                        <img src="{{asset('images/banner-3.png')}}" alt="banner woman image">
                    </div>
                </swiper-slide>
            </swiper-container>
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        </section>
        <section class="collection">
            <div class="container collection_info">
                <div class="collection__description">
                    <h2>new <br>arrival</h2>
                    <p>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipLorem ipsumLorem ipLorem ipsumLorem
                        ipsumLorem ipsumLorem ipsumLorem ipLorem ipsumLorem ip</p>
                    <a class="btn" href="#">Смотреть коллекцию</a>
                </div>
                <div class="collection__image">
                    <img src="{{asset('images/collection-img.png')}}" alt="collection img">
                    <p>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipLorem ipsumLorem ip</p>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="popular">
                <h3>популярное</h3>
                <div class="popular__products mySwiper">
                    <div class="swiper-wrapper">
                        <div class="product swiper-slide">
                            <img src="{{asset('images/product-1.png')}}" alt="product image">
                            <div class="product_description">
                                <h4 class="name">replay</h4>
                                <p class="category">Classic Shoes</p>
                                <p class="cost">9600 Руб.</p>
                            </div>
                        </div>
                        <div class="product swiper-slide">
                            <img src="{{asset('images/product-2.png')}}" alt="product image">
                            <div class="product_description">
                                <h4 class="name">replay</h4>
                                <p class="category">Classic Shoes</p>
                                <p class="cost">9600 Руб.</p>
                            </div>
                        </div>
                        <div class="product swiper-slide">
                            <img src="{{asset('images/product-3.png')}}" alt="product image">
                            <div class="product_description">
                                <h4 class="name">replay</h4>
                                <p class="category">Classic Shoes</p>
                                <p class="cost">9600 Руб.</p>
                            </div>
                        </div>
                        <div class="product swiper-slide">
                            <img src="{{asset('images/product-4.png')}}" alt="product image">
                            <div class="product_description">
                                <h4 class="name">Replay</h4>
                                <p class="category">Classic Shoes</p>
                                <p class="cost">9600 Руб.</p>
                            </div>
                        </div>
                        <div class="product swiper-slide">
                            <img src="{{asset('images/product-2.png')}}" alt="product image">
                            <div class="product_description">
                                <h4 class="name">Replay</h4>
                                <p class="category">Classic Shoes</p>
                                <p class="cost">9600 Руб.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-next"><img src="{{asset('images/right-arrow.png')}}" alt="prev"></div>
                <div class="button-prev"><img src="{{asset('images/left-arrow.png')}}" alt="prev"></div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        </section>
        <img class="logo_lines" src="{{asset('images/allegria-line.png')}}" alt="logo img">
        <section class="about">
            <div class="about_info">
                <h3>О</h3>
                <h2>нас</h2>
                <p>Бутик Allegria специализируется на продаже комфортной и современной одежды для свободного времени в
                    стиле
                    кэжуал. Мы считаем, что одежда - это источник радости, что и отражено в названии нашего бутика.</p>
            </div>
            <img src="{{asset('images/about-img.png')}}" alt="about img" class="about_img">
        </section>
        <script src="{{ asset('js/index.js') }}"></script>
    @endsection
</main>
</body>
</html>
