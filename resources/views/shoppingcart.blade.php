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

    <!-- Total Section -->
    <div class="total">
        <strong>Total: 2750€</strong>
    </div>

    <!-- Checkout Button -->
    <button class="checkout-btn">CHECK OUT</button>
</div>

@include('includes.footer')
