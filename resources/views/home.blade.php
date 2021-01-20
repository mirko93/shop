<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>

    {{-- <link rel="stylesheet" href="{{ asset('css/home-style.css'); }}"> --}}
</head>
<body>


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





</body>
</html>
