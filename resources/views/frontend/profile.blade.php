@extends('frontend.layouts.app')
@section('title', 'Профиль')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ time() }}">
@endsection
@section('content')
    <section>
        <h1>мой аккаунт</h1>
        <div class="profile">
            <div class="profile-links">
                <button data-num="1" type="button" id="btn" class="btn1">
                    <div class="img"><img src="{{asset('images/profile-icon.png')}}" alt="profile"></div>
                    <div class="active-img"><img src="{{asset('images/active-profile-icon.png')}}" alt="profile">
                    </div>
                    <h2>Личная информация</h2>
                </button>
                <button data-num="2" type="button" id="btn" class="btn2">
                    <div class="img"><img src="{{asset('images/address-icon.png')}}" alt="address"></div>
                    <div class="active-img"><img src="{{asset('images/active-address-icon.png')}}" alt="address">
                    </div>
                    <h2>Адрес</h2>
                </button>
                <button data-num="3" type="button" id="btn" class="btn3">
                    <div class="img"><img src="{{asset('images/list-icon.png')}}" alt="list"></div>
                    <div class="active-img"><img src="{{asset('images/active-list-icon.png')}}" alt="list"></div>
                    <h2>Лист пожеланий</h2>
                </button>
                <button data-num="4" type="button" id="btn" class="btn4">
                    <div class="img"><img src="{{asset('images/password-icon.png')}}" alt="password"></div>
                    <div class="active-img"><img src="{{asset('images/active-password-icon.png')}}" alt="password">
                    </div>
                    <h2>Изменить пароль</h2>
                </button>
                <form action="{{route('logout')}}" method="POST">
                    {{csrf_field()}}
                    <button href="{{route('logout')}}">
                        <div class="img"><img src="{{asset('images/logout-icon.png')}}" alt="logout"></div>
                        <h2>Выйти</h2>
                    </button>
                </form>
            </div>
            <div class="profile-content">
                <div class="profile-block text info" id="block1">
                    <div class="first_column">
                        <p>{{$profile->firstname}}</p>
                        <p>{{$profile->phone}}</p>
                    </div>
                    <div class="second_column">
                        <p>{{$profile->surname}}</p>
                        <p>{{$user->email}}</p>
                    </div>
                </div>
                <div class="address-block info" id="block2">
                    <div class="default-address-block">
                        <p>Адрес: {{$profile->address}}</p>
                        <button id="editAddress" type="button">Редактировать</button>
                    </div>
                    <form class="address_form" id="address_form" action="{{ route('profile.updateAddress') }}"
                          method="post">
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
                </div>
                <div class="list-block info" id="block3">
                    <div class="default-list-block text">
                        <p>В вас нет избранных товаров.</p>
                        <p>Добавляйте вещи, которые вам понравились, в список избранных, чтобы наблюдать за их
                            наличием
                            и ценой и легко найти.
                        </p>
                        <button class="submit_btn"><a href="{{ route('catalog') }}">перейти в каталог</a></button>
                    </div>
                    <div class="products-list-block" id="product-list-block">
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
                            <div class="product-line"></div>
                        @endforeach
                    </div>
                </div>
                <div class="password-block text info" id="block4">
                    <form action="{{route('profile.change-password')}}" class="password_form" method="post">
                        {{ csrf_field() }}
                        <div class="password-form-content">
                            <input id="current_password" name="current_password" type="password"
                                   placeholder="Старый пароль" required>
                            {!! $errors->first('current_password', '<p class="help-block">:message</p>') !!}
                            <input id="new_password" name="new_password" type="password" placeholder="Новый пароль"
                                   required>
                            {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
                            <input id="new_password_confirmation" name="new_password_confirmation" type="password"
                                   required placeholder="Повторите пароль">
                            {!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
                        </div>
                        <input type="submit" class="submit_btn" value="сохранить">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->has('current_password') || $errors->has('new_password') || $errors->has('new_password_confirmation'))
            $('#block4').addClass('content')
            $('.btn4').addClass('active')
            @endif
        });
    </script>
    <script src="{{ asset('js/profile.js') }}?v={{ time() }}"></script>
@endsection
