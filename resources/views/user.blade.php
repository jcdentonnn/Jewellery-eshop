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

        {{--Header--}}
        @include('includes.header')


        {{--Hlavny container--}}
        <div class="main-container">
            {{--User header s menom, emailom a 'Log Out' tlacidlom--}}
            <div class="user-header">
                <div class="user-name">
                    <h1>Hello, {{ $user->first_name }}</h1>
                    <p>{{ $user->email }}</p>
                </div>
                <a href="{{ route('logout') }}" class="logout-button">Log Out</a>
            </div>
            <hr>

            {{--Objednavky Usera--}}
            <div class="purchases-container">
                <div class="purchase-card" id="purchase-card"><h2>Your purchases</h2></div>

                @forelse($orders as $order)
                    <div class="purchase-card">
                        <div class="purchase-info">
                            <div class="purchase-text">
                                <h3>Purchase {{ \Carbon\Carbon::parse($order->timestamp)->format('F j, Y H:i') }}</h3>
                            </div>
                            <hr>
                            <div class="purchase-meta">
                                <span class="price">{{ number_format($order->totalprice,2) }}€</span>
                                <span class="status processed">PROCESSED</span>
                            </div>
                        </div>
                        <div class="return-confirm">
                            <a href="{{ route('more-purchase-info', ['id'=>$order->id]) }}"> <button class="more-button">MORE</button> </a>
                        </div>
                    </div>
                @empty
                    <div class="purchase-card">
                        <h3>You have no purchases yet.</h3>
                    </div>
                @endforelse
            </div>
        </div>

        {{--Footer--}}
        @include('includes.footer')

    </div>
</body>
</html>
