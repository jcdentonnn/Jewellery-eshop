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
    <div class="main-containerP">
        <div class="purchase-card">
            <h2>Order Details > Order No. {{ $order->id }}</h2>
        </div>

        @foreach ($orderItems as $item)
            <div class="purchase-card">
                <div class="elements-row">

                    <img class="purchase-img" src="/images/{{ $item->imagename }}" alt="{{ $item->productname }}">

                    <div class="purchase-details">
                        <div class="purchase-title">
                            <h3>{{ $item->productname }}</h3>
                            <p>Quantity: {{ $item->amount }}</p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach

        <div class="return-confirm">
            <a href="{{ route('user') }}">
                <button class="more-button">BACK</button>
            </a>
        </div>

    </div>

    <!--Footer-->
    @include('includes.footer')
</div>
</body>

</html>
