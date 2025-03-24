<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | Home</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

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

    <!--Objednavky Usera-->
    <div class="purchases-container">
        <h1>Your purchases</h1>
        <div class="purchase-card">
            <div class="purchase-info">
                <div class="purchase-text">
                    <h3>Purchase 21/02/2025</h3>
                    <p class="purchase-number">NO. XYZ12345</p>
                </div>
                <div class="purchase-meta">
                    <span class="price">950,56 €</span>
                    <span class="status finished">FINISHED</span>
                </div>
            </div>
            <button class="more-button">MORE</button>
        </div>
        <div class="purchase-card">
            <div class="purchase-info">
                <div class="purchase-text">
                    <h3>Purchase 12/03/2025</h3>
                    <p class="purchase-number">NO. ABC6789</p>
                </div>
                <div class="purchase-meta">
                    <span class="price">550,99 €</span>
                    <span class="status processed">PROCESSED</span>
                </div>
            </div>
            <button class="more-button">MORE</button>
        </div>
    </div>
</div>
</body>

@include('includes.footer')

</html>
