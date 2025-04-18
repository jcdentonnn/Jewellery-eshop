<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Maximilian Bumbera">
    <title>Jewellery Store | Shopping Cart </title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        @include('includes.header')

        <div class="cart-container">
            <h2 class="cart-header">Your Cart</h2>

            <div class="cart-header-row">
                <div>Product</div>
                <div>Price</div>
                <div>Quantity</div>
                <div>Total</div>
            </div>

            @foreach ($items as $item)
                <div class="cart-item">
                    <div class="cart-item-info">
                        <img src="/images/{{ $item->imagename }}" alt="Product Image">
                        <div class="product-name">{{ $item->productname }}</div>
                    </div>
                    <div class="product-prices">{{ number_format($item->price, 2) }}€</div>
                    <div class="cart-item-quantity">
                        <form method="POST" action="{{ url('/shoppingcart/decrease') }}">
                            @csrf
                            <input type="hidden" name="userid" value="{{ session('user_id') }}">
                            <input type="hidden" name="productid" value="{{ $item->productid }}">
                            <button type="submit">-</button>
                        </form>

                        <div class="amountbox">
                            <form method="POST" action="{{ url('/shoppingcart/update') }}">
                                @csrf
                                <input type="hidden" name="userid" value="{{ session('user_id') }}">
                                <input type="hidden" name="productid" value="{{ $item->productid }}">
                                <input
                                        type="number"
                                        name="amount"
                                        value="{{ $item->amount }}"
                                        onchange="this.form.submit()"
                                >
                            </form>
                        </div>

                        <form method="POST" action="{{ url('/shoppingcart/increase') }}">
                            @csrf
                            <input type="hidden" name="userid" value="{{ session('user_id') }}">
                            <input type="hidden" name="productid" value="{{ $item->productid }}">
                            <button type="submit">+</button>
                        </form>
                    </div>
                    <div class="product-total">
                        {{ number_format($item->price * $item->amount, 2) }}€
                    </div>
                </div>
            @endforeach

            @if ($items->isEmpty())
                <p style="text-align: center; margin-top: 30px;">Your cart is empty.</p>
            @endif

            @php
                $total = 0;
                foreach ($items as $item) {
                    $total += $item->price * $item->amount;
                }
            @endphp

            <div class="total">
                <strong>Total: {{ number_format($total, 2) }}€</strong>
            </div>

            @if (!$items->isEmpty())
                <form method="GET" action="{{ url('/shippingmethod') }}">
                    <input type="hidden" name="itemsprice" value="{{ $total }}">
                    <button type="submit" class="checkout-btn">CHECK OUT</button>
                </form>
            @endif

        </div>

        <!--Footer-->
        @include('includes.footer')
    </div>
</body>
</html>
