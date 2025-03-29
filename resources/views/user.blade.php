<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | User Profile </title>
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

            <!--Objednavky Usera-->
            <div class="purchases-container">
                <div class="purchase-card" id="purchase-card"><h2>Your purchases</h2></div>
                <div class="purchase-card">
                    <div class="purchase-info">
                        <div class="purchase-text">
                            <h3>Purchase 21/02/2025</h3>
                            <p class="purchase-number">NO. XYZ12345</p>
                        </div>
                        <hr>
                        <div class="purchase-meta">
                            <span class="price">950,56 €</span>
                            <span class="status finished">FINISHED</span>
                        </div>
                    </div>
                    <div class="return-confirm">
                        <a href="{{ route('more-purchase-info') }}"> <button class="more-button">MORE</button> </a>
                    </div>
                </div>
                <div class="purchase-card">
                    <div class="purchase-info">
                        <div class="purchase-text">
                            <h3>Purchase 12/03/2025</h3>
                            <p class="purchase-number">NO. ABC6789</p>
                        </div>
                        <hr>
                        <div class="purchase-meta">
                            <span class="price">550,99 €</span>
                            <span class="status processed">PROCESSED</span>
                        </div>
                    </div>
                    <div class="return-confirm">
                        <a href="{{ route('more-purchase-info') }}"> <button class="more-button">MORE</button> </a>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
        @include('includes.footer')

    </div>
</body>
</html>
