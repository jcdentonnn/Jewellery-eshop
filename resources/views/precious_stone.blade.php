<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | Precious Stone</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    @include('includes.header')

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
                            <div class="purchase">
                                <span class="prod-price-card">{{ number_format($product->price, 2) }}€</span>
                                <button class="prod-button" type="button">Add to Bag</button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @include('includes.footer')
</div>
</body>
</html>
