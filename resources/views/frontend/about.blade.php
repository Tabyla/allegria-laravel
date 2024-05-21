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
    <link rel="stylesheet" href="{{ asset('css/about.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <title>О нас</title>
</head>
<body>
@extends('frontend.layouts.app')
<main>
    @section('content')
        <section class="about_banner">
            <div class="banner_content">
                <div class="banner_text">
                    <h1>о нас</h1>
                    <p>Бутик Allegria специализируется на продаже комфортной и современной одежды для свободного времени
                        в
                        стиле кэжуал . Мы считаем, что одежда - это источник радости, что и отражено в названии нашего
                        бутика.
                    </p>
                </div>
            </div>
        </section>
        <section class="slogan container">
            <div class="slogan_text">
                <p class="text">American Vintage в первую очередь – это качественный трикотаж, изящная красота и летящий
                    крой.
                </p>
            </div>
            <div class="slogan_images">
                <img src="{{asset('images/left-slogan-image.png')}}" alt="left image">
                <img src="{{asset('images/right-slogan-image.png')}}" alt="right image">
            </div>
        </section>
        <section class="about container">
            <div class="about_text">
                <h2>о нас</h2>
                <div>
                    <p class="text">Броские сумки George Gina & Lucy поднимают настроение и своим обладательницам и
                        окружающим.</p>
                    <p class="text">Birkenstock – это обувь с мягкой ортопедической стелькой, позволяющая долгое время
                        находиться в обуви не уставая.</p>
                    <p class="text">Для всех представленных в бутике брендов важным приоритетом является экологическая
                        безопасность одежды и производства.</p>
                </div>
            </div>
            <div class="about_images">
                <img src="{{asset('images/left-slogan-image.png')}}" alt="right image">
                <img src="{{asset('images/right-slogan-image.png')}}" alt="right image">
            </div>
        </section>
        <section class="about_description">
            <p class="text">
                Для всех представленных в бутике брендов важным приоритетом является экологическая безопасность одежды и
                производства.
            </p>
        </section>
    @endsection
</main>
</body>
</html>
