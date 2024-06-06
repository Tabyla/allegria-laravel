@extends('frontend.layouts.app')
@section('title', 'О нас')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}?v={{ time() }}">
@endsection
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
