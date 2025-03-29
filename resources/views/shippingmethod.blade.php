<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery Store</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>
<body>

@include('includes.header')

<div class="checkout-container">
    <div class="checkout-section">
        <h2>Shipping method</h2>
        <div class="shipping-options">
            <label class="shipping-option">
                <input type="radio" name="shipping" value="standard">
                <div class="option-content">
                    <span class="option-title">Standard</span>
                    <span class="option-subtitle">6 to 8 business days</span>
                </div>
                <span class="option-price">4.99€</span>
            </label>
            <label class="shipping-option">
                <input type="radio" name="shipping" value="priority">
                <div class="option-content">
                    <span class="option-title">Priority</span>
                    <span class="option-subtitle">3 to 4 business days</span>
                </div>
                <span class="option-price">9.99€</span>
            </label>
            <label class="shipping-option">
                <input type="radio" name="shipping" value="priority-express">
                <div class="option-content">
                    <span class="option-title">Priority Express</span>
                    <span class="option-subtitle">1 to 3 business days</span>
                </div>
                <span class="option-price">14.99€</span>
            </label>
        </div>
    </div>

    <div class="checkout-section">
        <h2>Payment method</h2>
        <div class="payment-options">
            <label class="payment-option">
                <input type="radio" name="payment" value="credit-card">
                <span class="option-title">Credit Card</span>
                <span class="option-price">0.00€</span>
            </label>
            <label class="payment-option">
                <input type="radio" name="payment" value="paypal">
                <span class="option-title">PayPal</span>
                <span class="option-price">0.99€</span>
            </label>
            <label class="payment-option">
                <input type="radio" name="payment" value="cash-on-delivery">
                <span class="option-title">Cash on delivery</span>
                <span class="option-price">2.99€</span>
            </label>
        </div>
    </div>
</div>

<a href="{{ url('/inputaddress') }}"> <button class="proceed-btn">PROCEED</button> </a>

@include('includes.footer')
