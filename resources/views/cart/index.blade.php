<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">HOME</a></li>
            <li><a href="{{ route('shop.index') }}">SHOP</a></li>
            <li>
                <a href="{{ route('cart.index') }}">CART</a>
                @if (Cart::count() > 0)
                    <span>{{ Cart::count() }}</span>
                @endif
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1>Shopping Cart</h1>
    </div>

    <div class="cart-section">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)
                <h3>{{ Cart::count() }} Item's in cart</h3>

                <div class="cart-item">
                    @foreach (Cart::content() as $item)
                        <div>
                            <a href="{{ route('shop.show', $item->model->slug) }}">
                                <img src="{{ asset('img/products/' . $item->model->slug . '.jpg') }}" alt="product" width="100">
                            </a>

                            <div>
                                <div>
                                    <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                </div>
                                <div>{{ $item->model->details }}</div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>

                                <form action="{{ route('cart.switchToLaterPrice', $item->rowId) }}" method="POST">
                                    @csrf
                                    <button type="submit">Save to Later price</button>
                                </form>

                            </div>

                            <div>
                                <section>
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </section>
                            </div>

                            <div>{{ $item->model->presentPrice() }} RSD</div>
                        </div>
                    @endforeach
                </div>

                <br>

                <div class="cart-total">
                    <div>Price is PDV</div>
                    <div>SUBTOTAL: {{ number_format(Cart::subtotal(), 2) }} RSD</div>
                    <div>PDV: {{ number_format(Cart::tax(), 2) }} | 10%</div>
                    <div>TOTAL: {{ number_format(Cart::total(), 2) }} RSD</div>
                </div>
            @else
                <h3>No items in cart</h3>
                <a href="{{ route('shop.index') }}">Back to shop</a>
            @endif

            <hr>

            {{-- save to later --}}
            @if (Cart::count() > 0)
                <h3>{{ Cart::count() }} Item's saved for later</h3>

                <div class="cart-item">
                    @foreach (Cart::content() as $item)
                        <div>
                            <a href="{{ route('shop.show', $item->model->slug) }}">
                                <img src="{{ asset('img/products/' . $item->model->slug . '.jpg') }}" alt="product" width="100">
                            </a>

                            <div>
                                <div>
                                    <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                </div>
                                <div>{{ $item->model->details }}</div>
                            </div>
                        </div>
                        @endforeach
                </div>
            @else
                <h3>No items save for later</h3>
            @endif

        </div>
    </div>

</body>
</html>
