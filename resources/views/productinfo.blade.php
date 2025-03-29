<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery Store</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>
<body>

@include('includes.header')

<div class="product-container">
    <div class="product-gallery">
        <div class="main-image"></div>
        <div class="thumbnail-container">
            <div class="thumbnail"></div>
            <div class="thumbnail"></div>
            <div class="thumbnail"></div>
            <div class="thumbnail"></div>
        </div>
    </div>
    <div class="product-details">
        <h1 class="product-title">Title of the product</h1>
        <p class="product-description">Description of the product. I tried to make it longer for better visualisation of how it would look with longer text.</p>

        <div class="product-options">
            <select class="product-select">
                <option disabled selected>Select color</option>
                <option>White Gold</option>
                <option>Yellow Gold</option>
                <option>Pink Gold</option>
            </select>
            <label>
                <input type="checkbox"> Signature gift wrapping
            </label>
        </div>

        <div class="product-price">1500 EUR <span>incl. VAT</span></div>
        <button class="addtocartbutton">ADD TO BAG</button>

        <div class="product-links">
            <a href="#">Find in stores</a>
            <a href="#">Share</a>
            <span>REF. XYZ12345</span>
        </div>
    </div>
</div>

</body>

@include('includes.footer')

