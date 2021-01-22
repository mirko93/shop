@extends('layouts.app')

@section('content')
<div class="container">

    <h1>SHOP</h1>

    {{-- PRODUCT CATEGORY --}}
    <div class="product-category">
        <h2>Category</h2>

        <ul>
            @foreach ($categories as $category)
                <li><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category['name'] }}</a></li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2>{{ $categoryName }}</h2>

        <div>
            <strong>Price:</strong>
            <a href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_to_high']) }}">low to high</a>
            <a href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_to_low']) }}">high to low</a>
        </div>
    </div>

    {{-- products --}}
    <div class="products text-center">
        @forelse ($products as $product)
            <div class="product">
                <a href="{{ route('shop.show', $product->slug) }}">
                    <img src="{{ asset('img/products/' . $product->slug . '.jpg') }}" alt="product" width="300">
                </a>

                <a href="{{ route('shop.show', $product->slug) }}">
                    <div class="product-name">{{ $product['name'] }}</div>
                </a>

                <div class="product-price">{{ $product->presentPrice() }} RSD</div>
            </div>
        @empty
            <div>No items found.</div>
        @endforelse

        {{ $products->appends(request()->input())->links() }}
    </div>
</div>
@endsection
