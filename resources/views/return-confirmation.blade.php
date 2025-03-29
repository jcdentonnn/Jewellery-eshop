<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | Return Confirmation </title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <!--Header-->
        @include('includes.header')

        <!--Text potvrdenia vratenia vybraneho tovaru-->
        <div class="return-container">
            <h2>Returning of the purchase <b>No. XYZ12345</b><br> was successfully registered as <b>DFG678</b></h2>
            <p>We will be contacting you via email.</p>
        </div>

        <!--Footer-->
        @include('includes.footer')
    </div>
</body>
</html>
