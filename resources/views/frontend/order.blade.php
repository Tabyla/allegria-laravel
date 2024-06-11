@extends('frontend.layouts.app')
@section('title', 'Заказ №' . $order->id)

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}?v={{ time() }}">
@endsection
@section('content')
    <section class="order">
        <h1>Ваш заказ</h1>
        <div class="order-content">
            <img class="order-logo" src="{{asset('images/order-logo.png')}}" alt="logo">
            <div class="order-info">
                <div class="order-number">
                    <h2>номер заказа</h2>
                    <p>{{$order->id}}</p>
                </div>
                <div class="order-products">
                    @foreach($products as $product)
                        <div class="product">
                            <div class="product-info">
                                <h3>{{$product->product_name}}</h3>
                                <p class="brand">{{$product->brand_name}}</p>
                                <p class="cost">{{$product->price}} руб</p>
                            </div>
                            <div class="product-quantity">
                                <p>Количество: {{$product->quantity}} шт.</p>
                            </div>
                        </div>
                        <div class="product-line"></div>
                    @endforeach
                </div>
                <div class="total-price">
                    <p>Всего:</p>
                    <p class="price">{{$order->total_price}} руб</p>
                </div>
                <div class="user-info">
                    <div class="user-info-content text">
                        <img src="{{asset('images/profile.png')}}" alt="user profile">
                        <p>{{$fio}}</p>
                    </div>
                    <div class="user-info-content text">
                        <img src="{{asset('images/email-img.png')}}" alt="user profile">
                        <p>{{$order->user->email}}</p>
                    </div>
                    <div class="user-info-content text">
                        <img src="{{asset('images/address-icon.png')}}" alt="user profile">
                        <p>{{$order->address}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
