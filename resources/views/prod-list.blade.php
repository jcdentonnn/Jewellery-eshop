{{-- Product list, kde budu zobrazene uplne vsetky produkty pre poholie administratora --}}

@extends('layouts.app')

@section('title','Product List – Jewellery Store')

@section('content')

    {{--Hlavny container--}}
    <div class="main-container">

        {{--Zoznam produktov--}}

        <div>
            <br><br>
            <h2>Product List</h2>
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
