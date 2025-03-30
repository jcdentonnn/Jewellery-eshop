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

<div class="wrapper">

@include('includes.header')

<div class="contact-container">
    <h2>Contact Us</h2>

    <div class="contact-columns">
        <div class="contact-column">
            <img src="/images/questionicon.png" alt="Live Chat Icon" class="contact-icon">
            <h3>Live Chat</h3>
            <p>Want a quick answer?</p>
            <p></p>
            <p>Phone Hours:</p>
            <p><strong>Monday–Friday:</strong></p>
            <p>7:00 AM - 4:00 PM</p>
            <p><strong>Weekend:</strong></p>
            <p>7:00 AM - 6:00 PM</p>
        </div>

        <div class="contact-column">
            <img src="/images/phoneicon.png" alt="Phone Icon" class="contact-icon">
            <h3>Call Us</h3>
            <p><strong>0907-000-000</strong></p>
            <p></p>
            <p>Phone Hours:</p>
            <p><strong>Monday–Friday:</strong></p>
            <p>7:00 AM - 4:00 PM</p>
            <p><strong>Weekend:</strong></p>
            <p>Phones are closed, please chat with us.</p>
        </div>

        <div class="contact-column">
            <img src="/images/emailicon.png" alt="Email Icon" class="contact-icon">
            <h3>Email Us</h3>
            <p>Submit an email and we will get back to you soon.</p>
            <p></p>
            <p>Phone Hours:</p>
            <p><strong>Monday–Friday:</strong></p>
            <p>7:00 AM - 4:00 PM</p>
            <p><strong>Weekend:</strong></p>
            <p>7:00 AM - 6:00 PM</p>
        </div>
    </div>
</div>

</div>
</body>

@include('includes.footer')
</html>
