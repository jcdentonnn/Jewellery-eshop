{{--Kategoria 'Diamonds'--}}

@extends('layouts.app')

@section('title','Engagement – Jewellery Store')

@section('content')

    {{--Hlavny container pre ukazku produktov--}}
    <div class="main-container">
        {{--Product showcase--}}
        <div class="product-showcase">
                <img class="product-image-big" src="/images/titleRings.png" alt="Engagement rings. AI generated.">
            <div class="product-info">
                <h2>Engagement</h2>
                <p>The most important gift before stepping into a new chapter of your life</p>
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