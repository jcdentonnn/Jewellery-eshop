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
            <form>
                <input type="email" placeholder="Email Address *" required>

                <div class="form-row">
                    <input type="text" placeholder="First name *" required>
                    <input type="text" placeholder="Last name *" required>
                </div>

                <div class="form-row">
                    <input type="text" placeholder="Address Line 1 *" required>
                    <input type="text" placeholder="Address Line 2">
                </div>

                <div class="form-row">
                    <input type="text" placeholder="City *" required>
                    <input type="text" placeholder="Zip code *" required>
                </div>

                <input type="text" placeholder="State *" required>
                <input type="text" placeholder="Mobile Phone *" required>

                <button type="submit">COMPLETE ORDER</button>
            </form>
        </div>

        @include('includes.footer')
    </div>
</body>
</html>
