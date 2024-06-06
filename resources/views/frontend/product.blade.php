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
            <button type="button" id="add_to_cart" class="add-to-cart">добавить в корзину</button>
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
    <script src="{{ asset('js/product.js') }}?v={{ time() }}"></script>
@endsection
