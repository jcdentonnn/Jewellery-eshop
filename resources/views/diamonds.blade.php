@extends('layouts.app')

@section('title','Diamonds – Jewellery Store')

@section('content')

    <!--Hlavny container pre ukazku produktov-->
    <div class="main-container">
        <!--Product showcase-->
        <div class="product-showcase">
            <img class="product-image-big" src="/images/titleDiamond.png" alt="Diamonds">
            <div class="product-info">
                <h2>Diamonds</h2>
                <p>The hardest naturally occurring substance known, suitable for expressing everlasting love and affection</p>
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