@extends('layouts.app')

@section('title','Art Of Gift – Jewellery Store')

@section('content')

    <!--Hlavny container pre ukazku produktov-->
    <div class="main-container">
        <!--Product showcase-->
        <div class="product-showcase">
            <img class="product-image-big" src="/images/titleArtOfGift.png" alt="Art Of Gift. AI generated.">
            <div class="product-info">
                <h2>Art of Gift</h2>
                <p>To give a perfect gift is to know the receiver.
                    It is easier to master the art of picking such a gift with options available here</p>
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
