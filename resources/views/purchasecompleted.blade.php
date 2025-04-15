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

    <div class="order-confirmation">
        <h2>Thank you for your order!</h2>
        <p>
            We’ve received your purchase and will prepare your order for shipment.<br>
        </p>

        <a href="{{ url('/') }}">
            <button class="proceed-btn">BACK TO HOMEPAGE</button>
        </a>
    </div>

    @include('includes.footer')

</div>
</body>
</html>
