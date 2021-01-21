@extends('layouts.app')

@section('content')
<div class="container">

    <h1>HOME</h1>

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

        <a href="{{ route('shop.index') }}">View more products</a>

   </div>
</div>
@endsection
