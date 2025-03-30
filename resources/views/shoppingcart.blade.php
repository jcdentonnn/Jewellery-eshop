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

            <div class="cart-item">
                <div class="cart-item-info">
                    <img src="images/img.png" alt="Product Image">
                    <div class="product-name">Item name</div>
                </div>
                <div class="product-price">1100€</div>
                <div class="cart-item-quantity">
                    <button>-</button>
                    <input type="text" value="1">
                    <button>+</button>
                </div>
                <div class="product-total">1100€</div>
            </div>

            <div class="cart-item">
                <div class="cart-item-info">
                    <img src="images/img.png" alt="Product Image">
                    <div class="product-name">Item name</div>
                </div>
                <div class="product-price">550€</div>
                <div class="cart-item-quantity">
                    <button>-</button>
                    <input type="text" value="3">
                    <button>+</button>
                </div>
                <div class="product-total">1270€</div>
            </div>

            <div class="total">
                <strong>Total: 2750€</strong>
            </div>

            <a href="{{ url('/shippingmethod') }}"> <button class="checkout-btn">CHECK OUT</button> </a>

        </div>

        <!--Footer-->
        @include('includes.footer')
    </div>
</body>
</html>
