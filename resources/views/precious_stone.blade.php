@extends('layouts.app')

@section('title','Precious Stone – Jewellery Store')

@section('content')

    {{--Hlavny container pre ukazku produktov--}}
    <div class="main-container">
        <!--Product showcase-->
        <div class="product-showcase">
            <img class="product-image-big" src="/images/titlePrecious.png" alt="Precios stones. AI generated.">
            <div class="product-info">
                <h2>Precious Stones </h2>
                <p>Discover pieces with extraordinary stones which will express your identity</p>
            </div>
        </div>

        {{--Tlacitko pre zobrazenie/skrytie filtra--}}
        <button id="turnFilterBtn" class="turn-filter-btn">Show Filter</button>

        <div class="products">
            {{--Filter--}}
            @include('includes.product-filter')

            {{--Zoznam produktov--}}
            @include('includes.product-container')
        </div>
    </div>
@endsection