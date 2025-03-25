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

<!--Nadpis 'Free Delivery'-->
<div class="delivery-bar">
    EXPRESS DELIVERY ON EVERY ORDER UNTIL MAY 1ST
</div>

<div class="top-bar">
    <div class="left-links">
        <span>EN</span> | <span>Contact Us</span> | <span>Services</span>
    </div>
    <a class="store-name" href="{{ route('home') }}">Jewellery store</a>
    <div class="icons">
        <a href="{{ route('user') }}"><img class="icons-img" src="/images/user.png" alt="User"></a>
        <img class="icons-img" src="/images/fav.png"  alt="favourites">
        <img class="icons-img" src="/images/pin.png"  alt="location">
        <a href="{{ route('shoppingcart') }}"><img class="icons-img" src="/images/shopCart.png"  alt="shopping-cart"></a>
    </div>
</div>

<!-- Navigation Bar -->
<nav class="navbar">
    <ul>
        <li><a href="{{ route('engagement') }}">Engagement</a></li>
        <li><a href="{{ route('diamonds') }}">Diamonds</a></li>
        <li><a href="{{ route('precious_stone') }}">Precious Stone</a></li>
        <li><a href="{{ route('watches') }}">Watches</a></li>
        <li><a href="{{ route('accessories') }}">Accessories</a></li>
        <li><a href="{{ route('art_of_gift') }}">Art of Gift</a></li>
    </ul>
</nav>

<div class="nav-underline"></div>
</body>
