<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | Wishlist </title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

@include('includes.header')


<!-- Hlavny container -->
<div class="main-container">

    <!-- User header s menom, emailom a 'Log Out' tlacidlom -->
    <div class="user-header">
        <div class="user-name">
            <h1>Hello, XYZ</h1>
            <p>xyz@zyx.com</p>
        </div>
        <div class="user-logout-div"><button id="logout">Log Out</button> </div>
    </div>
    <hr>

    <!-- Wishlist itemy -->
    <div class="purchase-card">
        <h2>Wishlist</h2>
    </div>

    <div class="purchase-card">
        <div class="elements-row">
            <img class="purchase-img" src="/images/img.png" alt="purchase-img">

            <div class="purchase-details">
                <div class="purchase-title">
                    <h3>White gold earrings</h3>
                    <input type="checkbox" class="purchase-checkbox" />
                </div>
                <div class="purchase-meta-row">
                    <p class="purchase-number">Ref. XYZ12345</p>
                    <span class="price">1024,76 €</span>
                </div>
            </div>
        </div>

        <hr>

        <div class="purchase-actions">
            <button class="more-button">Purchase</button>
        </div>
    </div>

    <button class="more-button">Confirm purchase</button>
</div>
</body>

@include('includes.footer')

</html>
