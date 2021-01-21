@extends('layouts.app')

@section('content')
<div class="container">

    <h1>SHOP</h1>

    {{-- PRODUCT CATEGORY --}}
    <div class="product-category">
        <h2>Category</h2>

        <ul>
            <a href="#">
                <li>Laptop</li>
            </a>
            <a href="#">
                <li>TV</li>
            </a>
            <a href="#">
                <li>Game</li>
            </a>
        </ul>
    </div>

    {{-- products --}}
    <div class="products text-center">
        @foreach ($products as $product)
            <div class="product">
                <a href="{{ route('shop.show', $product->slug) }}">
                    <img src="{{ asset('img/products/' . $product->slug . '.jpg') }}" alt="product" width="300">
                </a>

                <a href="{{ route('shop.show', $product->slug) }}">
                    <div class="product-name">{{ $product['name'] }}</div>
                </a>

                <div class="product-price">{{ $product->presentPrice() }} RSD</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
