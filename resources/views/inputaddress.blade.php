<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Maximilian Bumbera">
    <title>Jewellery Store | Address Entering</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">

    @include('includes.header')

    <div class="address-billing-container">
        <h2>Billing Address</h2>
        <form method="POST" action="{{ url('/save-address') }}">
            @csrf
            <input type="email" name="emailadress" placeholder="Email Address *" required>

            <div class="form-row">
                <input type="text" name="firstname" placeholder="First name *" required>
                <input type="text" name="lastname" placeholder="Last name *" required>
            </div>

            <div class="form-row">
                <input type="text" name="address1" placeholder="Address Line 1 *" required>
                <input type="text" name="address2" placeholder="Address Line 2">
            </div>

            <div class="form-row">
                <input type="text" name="city" placeholder="City *" required>
                <input type="text" name="zipcode" placeholder="Zip code *" required>
            </div>

            <input type="text" name="state" placeholder="State *" required>
            <input type="text" name="phonenumber" placeholder="Mobile Phone *" required>

            <input type="hidden" name="totalprice" value="{{ $total }}">

            <div class="totalprice">
                <p><strong>Items Price:</strong> {{ number_format($itemsPrice, 2) }}€</p>
                <p><strong>Shipping Method:</strong> {{ ucfirst(str_replace('-', ' ', $deliveryType)) }} — {{ number_format($deliveryPrice, 2) }}€</p>
                <p><strong>Payment Type:</strong> {{ ucfirst(str_replace('-', ' ', $paymentType)) }} — {{ number_format($paymentPrice, 2) }}€</p>
                <hr>
                <p><strong>Total:</strong> {{ number_format($total, 2) }}€</p>
            </div>

            <button type="submit">COMPLETE ORDER</button>
        </form>
    </div>

    @include('includes.footer')
</div>
</body>
</html>
