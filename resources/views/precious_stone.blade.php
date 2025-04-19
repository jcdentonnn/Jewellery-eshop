@extends('layouts.app')

@section('title','Precious Stone – Jewellery Store')

@section('content')

    <!--Hlavny container pre ukazku produktov-->
    <div class="main-container">
        <!--Product showcase-->
        <div class="product-showcase">
            <img class="product-image-big" src="/images/titlePrecious.png" alt="Precios stones. AI generated.">
            <div class="product-info">
                <h2>Precious Stones </h2>
                <p>Discover pieces with extraordinary stones which will express your identity</p>
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
            <div class="product-container" id="productList">
                @foreach ($products as $product)
                    <a href="{{ route('productinfo', $product->id) }}">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="/images/{{ $product->imagename }}" alt="{{ $product->productname }}">
                                <h4 class="prod-name-card">{{ $product->productname }}</h4>
                                <p class="prod-info-card">{{ $product->productdesc }}</p>
                            </div>

                            <!-- Tlacidlo na pridanie produktu do kosika -->
                            <form action="{{ route('cart.add') }}" method="POST" style="display:inline">
                                @csrf
                                <input type="hidden" name="productid" value="{{ $product->id }}">
                                <input type="hidden" name="type" value="{{ $product->type }}">
                                <input type="hidden" name="amount"    value="1">
                                <button class="prod-button" type="submit">Add to Bag</button>
                            </form>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection