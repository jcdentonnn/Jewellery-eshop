@extends('layouts.app')

@section('title','Accessories – Jewellery Store')

@section('content')
    <!--Hlavny container pre ukazku produktov-->
    <div class="main-container">
        <!--Product showcase-->
        <div class="product-showcase">
            <img class="product-image-big" src="/images/titleAccessories.png" alt="Accessories. AI generated.">
            <div class="product-info">
                <h2>Accessories</h2>
                <p>Leather goods, scarves and sunglasses - perfect accessories</p>
            </div>
        </div>

        <!--Tlacitko pre zobrazenie/skrytie filtra-->
        <button id="turnFilterBtn" class="turn-filter-btn">Show Filter</button>

        <div class="products">
            <!--Filter-->
            @include('includes.product-filter')

            <!--Zoznam produktov-->
            @include('includes.product-container')

        </div>
    </div>
@endsection