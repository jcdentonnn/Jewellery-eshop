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
            <div class="product-filter">
                <h3>Sort By</h3>
                <p><input type="radio" name="sort"> Most Popular</p>
                <p><input type="radio" name="sort"> Price: High to Low</p>
                <p><input type="radio" name="sort"> Price: Low to High</p>
                <h3>Filter By</h3>
                <p><input type="radio" name="filter"> Available Online</p>
                <p><input type="radio" name="filter"> New</p>
                <h3>Category</h3>
                <p><input type="checkbox" name="category"> Engagement Rings</p>
                <p><input type="checkbox" name="category"> Rings</p>
                <p><input type="checkbox" name="category"> Earrings</p>
                <p><input type="checkbox" name="category"> Necklaces</p>
                <p><input type="checkbox" name="category"> Bracelets</p>
                <p><input type="checkbox" name="category"> Cufflinks</p>
                <h3>Metal</h3>
                <p><input type="checkbox" name="metal"> Yellow Gold</p>
                <p><input type="checkbox" name="metal"> White Gold</p>
                <p><input type="checkbox" name="metal"> Rose Gold</p>
                <p><input type="checkbox" name="metal"> Platinum</p>
                <p><input type="checkbox" name="metal"> Silver</p>
                <h3>Paving</h3>
                <p><input type="checkbox" name="paving"> Non-paved</p>
                <p><input type="checkbox" name="paving"> Paved</p>
                <p><input type="checkbox" name="paving"> Semi-Paved</p>
            </div>

            <!--Zoznam produktov-->
            @include('includes.product-container')
        </div>
    </div>
@endsection