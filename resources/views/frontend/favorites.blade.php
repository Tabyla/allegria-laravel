@extends('frontend.layouts.app')
@section('title', 'Избранные товары')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}?v={{ time() }}">
@endsection
@section('content')
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
                        <div class="product-info">
                            <div class="product-content">
                                <h4 class="name">{{$product->product_name}}</h4>
                                <p class="category">{{$product->category_name}}</p>
                                <p class="cost">{{$product->price}} Руб.</p>
                            </div>
                            <button class="list-btn">Добавить в корзину</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
