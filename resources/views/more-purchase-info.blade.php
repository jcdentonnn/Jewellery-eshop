<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | More Purchase Info </title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>

<body>

<div class="wrapper">

    <!--Header-->
    @include('includes.header')


    <!--Hlavny container-->
    <div class="main-container">

        <!--User header s menom, emailom a 'Log Out' tlacidlom-->
        <div class="user-header">
            <div class="user-name">
                <h1>Hello, XYZ</h1>
                <p>xyz@zyx.com</p>
            </div>
            <div class="user-logout-div"><button id="logout">Log Out</button> </div>
        </div>
        <hr>

        <div class="purchase-card">
            <h2>Your purchases > Purchase No. XYZ12345</h2>
        </div>

        <div class="purchase-card">
            <div class="elements-row">
                <img class="purchase-img" src="/images/ring12.png" alt="White Gold Topaz Ring.AI generated.">

                <div class="purchase-details">
                    <div class="purchase-title">
                        <h3>White gold topaz ring</h3>
                        <input type="checkbox" class="purchase-checkbox" />
                    </div>
                    <div class="purchase-meta-row">
                        <p class="purchase-number">Ref. XYZ12345</p>
                        <span class="price">950,56 €</span>
                    </div>
                </div>
            </div>

            <hr>

            <div class="purchase-actions">
                <button class="more-button">CONTACT SUPPORT</button>
            </div>
        </div>

        <div class="return-confirm">
            <a href="{{route('return-confirmation')}}"><button class="more-button">CONFIRM RETURNING</button></a>
        </div>

    </div>

    <!--Footer-->
    @include('includes.footer')
</div>
</body>

</html>
