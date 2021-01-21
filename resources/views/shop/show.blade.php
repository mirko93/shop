@extends('layouts.app')

@section('content')
<div class="container">
    <h1>PRODUCT</h1>
</div>

<div class="product-section">
    <div class="product-image">
        <img src="{{ asset('img/products/' . $product->slug . '.jpg') }}" alt="product" width="300">
    </div>

    <div class="product-information">
        <h2>{{ $product['name'] }}</h2>
        <div>{{ $product['details'] }}</div>
        <div>{{ $product->presentPrice() }} RSD</div>

        <p>{{ $product['description'] }}</p>

        <form action="{{ route('cart.store') }}" method="POST">

            @csrf

            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">

            <button type="submit">Add to Cart</button>
        </form>
    </div>
</div>

<div class="similar-products container">
    <h2>Similar Products</h2>

    <div class="similarProducts" style="display: flex">
        @foreach ($similarProducts as $similarProduct)
            <a href="{{ route('shop.show', $similarProduct->slug) }}">
                <img src="{{ asset('img/products/' . $similarProduct->slug . '.jpg') }}" alt="" width="200">
                <div>{{ $similarProduct['name'] }}</div>
                <div>{{ $similarProduct->presentPrice() }} RSD</div>
            </a>
        @endforeach
    </div>
</div>
@endsection
