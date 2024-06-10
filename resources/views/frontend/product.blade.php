@extends('frontend.layouts.app')
@section('title', 'Товар')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}?v={{ time() }}">
@endsection
@section('content')
    <section class="product-page">
        <div class="product-gallery">
            <div class="thumbnails">
                @foreach ($productImages as $productImage)
                    <img src="{{ asset('images/products/' . $productImage->image_path) }}"
                         alt="Thumbnail" class="thumbnail">
                @endforeach
            </div>
            <div class="main-image">
                @foreach ($product as $productInfo)
                    <img src="{{ asset('images/products/' . $productInfo->image_path) }}"
                         alt="{{ $productInfo->product_name }}" id="main-image">
                @endforeach
            </div>
        </div>
        <div class="product-content">
            <div class="product-info">
                @foreach ($product as $productInfo)
                    <h1>{{$productInfo->product_name}}</h1>
                    <p class="category">{{$productInfo->category_name}}</p>
                    <p class="brand">{{$productInfo->brand_name}}</p>
                    <p class="price">{{$productInfo->price}} руб</p>
                @endforeach
            </div>
            <div class="sizes-block">
                <p class="text">Размер</p>
                <div class="sizes">
                    @foreach($sizes as $size)
                        <div class="block-content">{{$size->name}}</div>
                    @endforeach
                </div>
            </div>
            <div class="colors-block">
                <p class="text">Цвет</p>
                <div class="colors">
                    @foreach($colors as $color)
                        <div class="block-content">{{$color->name}}</div>
                    @endforeach
                </div>
            </div>
            @if ($cart->has($productId))
                <div class="quantity-control" id="favorite-item-{{$productId}}">
                    <button class="decrease-quantity" data-product-id="{{ $productId }}">-
                    </button>
                    <span class="product-quantity">{{ $cart->get($productId) }}</span>
                    <button class="increase-quantity" data-product-id="{{ $productId }}">+
                    </button>
                </div>
            @else
                <form id="favorite-btn-{{$productId}}"
                      action="{{route('cart.add', $productId)}}" class="password_form"
                      method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="add-to-cart">Добавить в
                        корзину
                    </button>
                </form>
            @endif
            <button type="button" id="buy-btn" class="buy-btn">купить в один клик</button>
            <div class="modals-help">
                <a id="payment" href="#">Оплата и доставка</a>
                <a id="exchange" href="#">Возврат и обмен</a>
            </div>
            <h2>Информация о товаре</h2>
            @foreach ($product as $productInfo)
                <p class="description">{{$productInfo->description}}</p>
            @endforeach
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
    <script src="{{ asset('js/product.js') }}?v={{ time() }}"></script>
@endsection
