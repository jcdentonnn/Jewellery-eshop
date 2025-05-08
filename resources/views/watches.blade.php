@extends('layouts.app')

@section('title','Watches – Jewellery Store')

@section('content')

    {{--Hlavny container pre ukazku produktov--}}
    <div class="main-container">
        {{--Product showcase--}}
        <div class="product-showcase">
            <img class="product-image-big" src="/images/titleWatches.png" alt="Watches. AI generated.">
            <div class="product-info">
                <h2>Watches</h2>
                <p>Durable, modern or classic. All with water and dust protection</p>
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
