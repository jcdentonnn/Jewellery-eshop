<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery Store</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>
<body>

<!-- Free Delivery Bar -->
<div class="delivery-bar">
    EXPRESS DELIVERY ON EVERY ORDER UNTIL MAY 1ST
</div>


<div class="top-bar">
    <div class="left-links">
        <span>EN</span> | <span>Contact Us</span> | <span>Services</span>
    </div>
    <div class="store-name">Jewellery store</div>
    <div class="icons">
        <span>ikonky</span>
    </div>
</div>


<!-- Navigation Bar -->
<nav class="navbar">
    <ul>
        <li>Engagement</li>
        <li>Diamonds</li>
        <li>Precious Stone</li>
        <li>Watches</li>
        <li>Accessories</li>
        <li>Art of Gift</li>
    </ul>
</nav>

<!-- ?? -->
<div class="nav-underline"></div>

<div class="register-container">
    <h2>Register</h2>
    <form>
        <input type="text" placeholder="First name" required>
        <input type="text" placeholder="Last name" required>
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Password" required>
        <button type="submit">CREATE ACCOUNT</button>
    </form>
</div>

</body>

<?php include 'includes/footer.php';?>

</html>
