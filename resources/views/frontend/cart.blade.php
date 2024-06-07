@extends('frontend.layouts.app')
@section('title', 'Корзина')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}?v={{ time() }}">
@endsection
@section('content')
    <section class="default-cart">
        <h1>Ваша корзина пуста</h1>
        <div class="cart-info text">
            <img src="{{asset('images/cart-default-image.png')}}" alt="cart img">
            <p>Добавьте что-то, чтобы сэкономить время и сделать шопинг еще более приятным.</p>
            <button class="submit_btn"><a href="{{route('catalog')}}">Перейти в каталог</a></button>
        </div>
    </section>
    <section class="order">
        <h1>Корзина</h1>
        <div class="cart">
            <div class="cart-order">
                <form method="post" action="#" class="order-content" id="order-block">
                    <div class="user-info">
                        <input required class="form_input" type="text" placeholder="Фамилия"
                               value="{{$profile->surname}}">
                        <input required class="form_input" type="text" placeholder="Имя"
                               value="{{$profile->firstname}}">
                        <input required class="form_input" type="email" placeholder="Email"
                               value="{{$user->email}}">
                        <input required class="form_input" type="tel" placeholder="Номер телефона"
                               value="{{$profile->phone}}">
                    </div>
                    <div class="order-address text" id="default-address-block">
                        <h2>доставка</h2>
                        <p>{{$profile->address}}</p>
                        <button type="button" id="open-address-form">Редактировать</button>
                    </div>
                    <input type="submit" class="submit_btn" value="заказать">
                </form>
                <div class="edit-address" id="edit-address">
                    <p>Редактирование адреса</p>
                    <form class="address_form" id="address_form" method="post">
                        {{csrf_field()}}
                        <div class="form_content">
                            <input type="text" id="city" name="city" placeholder="Город">
                            <input type="text" id="street" name="street" placeholder="Улица">
                            <div class="inputs_row">
                                <input type="text" id="house" name="house" placeholder="Дом">
                                <input type="text" id="apartment" name="apartment" placeholder="Квартира">
                            </div>
                        </div>
                        <input type="submit" class="submit_btn" value="сохранить">
                    </form>
                    <button type="button" id="close-address-form">Назад</button>
                </div>
            </div>
            <div class="cart-content">
                <div class="list-block info" id="block3">
                    <div class="default-list-block text">
                        <p>В вас нет избранных товаров.</p>
                        <p>Добавляйте вещи, которые вам понравились, в список избранных, чтобы наблюдать за их наличием
                            и ценой и легко найти.
                        </p>
                        <button class="submit_btn"><a href="{{ route('catalog') }}">перейти в каталог</a></button>
                    </div>
                    <div class="products-list-block">
                        <div class="product">
                            <div class="list-delete"><img src="{{asset('images/close.png')}}" alt="delete"></div>
                            <img src="{{asset('images/products/product-4.png')}}" alt="product img"
                                 class="product-image">
                            <div class="product-info">
                                <div class="product-content">
                                    <h4 class="name">Replay</h4>
                                    <p class="category">Classic Shoes</p>
                                    <p class="cost">9600 Руб.</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-line"></div>
                        <div class="product">
                            <div class="list-delete"><img src="{{asset('images/close.png')}}" alt="delete"></div>
                            <img src="{{asset('images/products/product-3.png')}}" alt="product img"
                                 class="product-image">
                            <div class="product-info">
                                <div class="product-content">
                                    <h4 class="name">Replay</h4>
                                    <p class="category">Classic Shoes</p>
                                    <p class="cost">9600 Руб.</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-line"></div>
                        <div class="product">
                            <div class="list-delete"><img src="{{asset('images/close.png')}}" alt="delete"></div>
                            <img src="{{asset('images/products/product-2.png')}}" alt="product img"
                                 class="product-image">
                            <div class="product-info">
                                <div class="product-content">
                                    <h4 class="name">Replay</h4>
                                    <p class="category">Classic Shoes</p>
                                    <p class="cost">9600 Руб.</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-line"></div>
                        <div class="product">
                            <div class="list-delete"><img src="{{asset('images/close.png')}}" alt="delete"></div>
                            <img src="{{asset('images/products/product-1.png')}}" alt="product img"
                                 class="product-image">
                            <div class="product-info">
                                <div class="product-content">
                                    <h4 class="name">Replay</h4>
                                    <p class="category">Classic Shoes</p>
                                    <p class="cost">9600 Руб.</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-line"></div>
                        <div class="total-price">
                            <p>Всего:</p>
                            <p class="price">7600 руб</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#open-address-form').on('click', function() {
                $('#order-block').css('display', 'none');
                $('#edit-address').css('display', 'flex');
            });
            $('#close-address-form').on('click', function() {
                $('#edit-address').css('display', 'none');
                $('#order-block').css('display', 'flex');
            });
        });
    </script>
    <script src="{{ asset('js/cart.js') }}?v={{ time() }}"></script>
@endsection
