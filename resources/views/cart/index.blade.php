@extends('layouts.app')

@section('content')
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

                            {{-- <form action="{{ route('cart.switchToLaterPrice', $item->rowId) }}" method="POST">
                                @csrf
                                <button type="submit">Save to Later price</button>
                            </form> --}}

                        </div>

                        <div>
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @for ($i = 1; $i < 5 + 1; $i++)
                                    <option {{ $item->quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div>{{ presentPrice($item->subtotal) }} RSD</div>
                    </div>
                @endforeach
            </div>

            <br>

            <div class="cart-total">
                <div>Price is PDV</div>
                <div>SUBTOTAL: {{ presentPrice(Cart::subtotal(), 2) }} RSD</div>
                <div>PDV: {{ presentPrice(Cart::tax(), 2) }} | 10%</div>
                <div>TOTAL: {{ presentPrice(Cart::total(), 2) }} RSD</div>
            </div>
        @else
            <h3>No items in cart</h3>
            <a href="{{ route('shop.index') }}">Back to shop</a>
        @endif

        <hr>

        {{-- save to later --}}
        {{-- @if (Cart::count() > 0)
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
        @endif --}}

    </div>
</div>
@endsection

@section('extra-js')
<script>
    (function() {
        const classname = document.querySelectorAll('.quantity');

        Array.from(classname).forEach(function (element) {
            element.addEventListener('change', function () {

                const id = element.getAttribute('data-id');

                axios.patch('/cart/' + id, {
                    quantity: this.value
                })
                .then((response) => {
                    // console.log(response);
                    window.location.href = "{{ route('cart.index') }}";
                })
                .catch((error) => {
                    console.log(error);
                    window.location.href = "{{ route('cart.index') }}";
                });
            });
        });
    })();
</script>
@endsection
