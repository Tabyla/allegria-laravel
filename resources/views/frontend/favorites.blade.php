@extends('frontend.layouts.app')
@section('title', 'Избранные товары')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}?v={{ time() }}">
@endsection
@section('content')
    @if(!$favorites[0])
        <section class="default-cart">
            <h1>Избранных товаров нет</h1>
            <div class="cart-info text">
                <img src="{{asset('images/cart-default-image.png')}}" alt="cart img">
                <p>Добавьте что-то, чтобы сэкономить время и сделать шопинг еще более приятным.</p>
                <button class="submit_btn"><a href="{{route('catalog')}}">Перейти в каталог</a></button>
            </div>
        </section>
    @else
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
                            <div class="product-info" data-product-id="{{ $product->id }}">
                                <div class="product-content">
                                    <h4 class="name">{{$product->product_name}}</h4>
                                    <p class="category">{{$product->category_name}}</p>
                                    <p class="cost">{{$product->price}} Руб.</p>
                                </div>
                                @if ($cart->has($product->id))
                                    <div class="quantity-control" id="favorite-item-{{$product->id}}">
                                        <button class="decrease-quantity" data-product-id="{{ $product->id }}">-
                                        </button>
                                        <span class="product-quantity">{{ $cart->get($product->id) }}</span>
                                        <button class="increase-quantity" data-product-id="{{ $product->id }}">+
                                        </button>
                                    </div>
                                @else
                                    <form id="favorite-btn-{{$product->id}}"
                                          action="{{route('cart.add', $product->id)}}" class="password_form"
                                          method="post">
                                        {{ csrf_field() }}
                                        <button type="submit" class="list-btn add-to-cart-btn">Добавить в
                                            корзину
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <script>
            $(document).ready(function () {
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
                            } else {
                                quantityElement.text(newQuantity);
                            }
                        },
                        error: function (xhr) {
                            alert('Ошибка при обновлении корзины: ' + xhr.responseText);
                        }
                    });
                }
            });
        </script>
    @endif
@endsection
