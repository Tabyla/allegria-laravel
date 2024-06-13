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
                <div class="order-content" id="order-block">
                    <div class="user-info">
                        <input required class="form_input" type="text" disabled placeholder="Фамилия"
                               value="{{$profile->surname}}">
                        <input required class="form_input" type="text" disabled placeholder="Имя"
                               value="{{$profile->firstname}}">
                        <input required class="form_input" type="email" disabled placeholder="Email"
                               value="{{$user->email}}">
                        <input required class="form_input" type="tel" disabled placeholder="Номер телефона"
                               value="{{$profile->phone}}">
                    </div>
                    <div class="order-address text" id="default-address-block">
                        <h2>доставка</h2>
                        <p id="address-text">{{$profile->address}}</p>
                        <button type="button" id="open-address-form">Редактировать</button>
                    </div>
                    <form action="{{ route('order.create') }}" id="order-form" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="address" id="address-input">
                        <input type="submit" id="order-button" class="submit_btn" value="заказать">
                    </form>
                    <h2 class="nonaddress">Заполните адрес</h2>
                </div>
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
                        <input type="button" id="save-address" class="submit_btn" value="сохранить">
                    </form>
                    <button type="button" id="close-address-form">Назад</button>
                </div>
            </div>
            <div class="cart-content">
                <div class="list-block info">
                    <div class="products-list-block">
                        @if(count($cart) > 0)
                            @foreach($cart as $productId => $details)
                                <div class="product" id="cart-item-{{$productId}}">
                                    <form action="{{ route('cart.remove', ['id' => $productId]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="list-delete"><img
                                                src="{{asset('images/close.png')}}" alt="delete">
                                        </button>
                                    </form>
                                    <img src="{{ asset('images/products/' . $details['image']) }}"
                                         alt="{{$details['name'] }}"
                                         class="product-image">
                                    <div class="product-info">
                                        <div class="product-content">
                                            <h4 class="name">{{ $details['name'] }}</h4>
                                            <p class="category">{{ $details['category'] }}</p>
                                            <p class="cost">{{ $details['price'] }} Руб.</p>
                                        </div>
                                        <div class="quantity-control">
                                            <button class="decrease-quantity" data-product-id="{{ $productId }}">-
                                            </button>
                                            <span class="product-quantity">{{ $details['quantity'] }}</span>
                                            <button class="increase-quantity" data-product-id="{{ $productId }}">+
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-line" id="cart-item-line-{{$productId}}"></div>
                            @endforeach
                            <div class="total-price">
                                <p>Всего:</p>
                                <p class="price"
                                   id="cart-total">{{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }}
                                    руб</p>
                            </div>
                        @else
                            <div class="default-list-block text">
                                <h3>Корзина пуста.</h3>
                                <p>Добавляйте вещи, которые вам понравились, в список избранных, чтобы наблюдать за их
                                    наличием
                                    и ценой и легко найти.
                                </p>
                                <button class="submit_btn"><a href="{{ route('catalog') }}">перейти в каталог</a>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('.decrease-quantity').click(function () {
            let productId = $(this).data('product-id');
            let quantityElement = $(this).siblings('.product-quantity');
            let currentQuantity = parseInt(quantityElement.text());

            if (currentQuantity > 0) {
                updateCart(productId, currentQuantity - 1, quantityElement);
            }
        });

        $('.increase-quantity').click(function () {
            let productId = $(this).data('product-id');
            let quantityElement = $(this).siblings('.product-quantity');
            let currentQuantity = parseInt(quantityElement.text());

            updateCart(productId, currentQuantity + 1, quantityElement);
        });

        function updateCart(productId, newQuantity, quantityElement) {
            $.ajax({
                url: '/cart/update',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: newQuantity
                },
                success: function () {
                    if (newQuantity <= 0) {
                        location.reload();
                        updateTotal();
                    } else {
                        quantityElement.text(newQuantity);
                        updateTotal();
                    }
                },
                error: function (xhr) {
                    alert('Ошибка при обновлении корзины: ' + xhr.responseText);
                }
            });
        }

        function updateTotal() {
            let total = 0;

            $('.product').each(function () {
                let price = parseFloat($(this).find('.cost').text().replace(' Руб.', ''));
                let quantity = parseInt($(this).find('.product-quantity').text());
                total += price * quantity;
            });

            $('#cart-total').text(total + ' руб');
        }
    </script>
    <script src="{{ asset('js/cart.js') }}?v={{ time() }}"></script>
@endsection
