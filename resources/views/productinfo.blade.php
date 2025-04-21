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
<div class="wrapper">

    @include('includes.header')

    <div class="product-containeros">
        <div class="product-gallery">
            <div class="main-image">
                <img src="/images/{{ $product->imagename }}" alt="Main Watch" id="mainImage">
            </div>
            <div class="thumbnail-container">
                <div class="thumbnail"><img class="thumbnail_img" src="/images/{{ $product->imagename }}" alt="Thumbnail 1"></div>
                <div class="thumbnail"><img class="thumbnail_img" src="/images/{{ $product->imagename2 }}" alt="Thumbnail 2"></div>
                <div class="thumbnail"><img class="thumbnail_img" src="/images/{{ $product->imagename3 }}" alt="Thumbnail 3"></div>
                <div class="thumbnail"><img class="thumbnail_img" src="/images/{{ $product->imagename4 }}" alt="Thumbnail 4"></div>
            </div>
        </div>
        <div class="product-details">
            <h1 class="product-title">{{ $product->productname }}</h1>
            <p class="product-description">{{ $product->productdesc }}</p>

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

            <div class="product-price">{{ number_format($product->price, 2) }} EUR <span>incl. VAT</span></div>

            <!-- Tlacidlo na pridanie produktu do kosika -->
            <form action="{{ route('cart.add') }}" method="POST" style="display:inline">
                @csrf
                <input type="hidden" name="productid" value="{{ $product->id }}">
                <input type="hidden" name="type" value="{{ $product->type }}">
                <input type="hidden" name="amount"    value="1">
                <button class="addtocartbutton" type="submit">Add to Bag</button>
            </form>

            <div class="product-links">
                <a href="#">Find in stores</a>
                <a href="#">Share</a>
                <span>REF. XYZ12345</span>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')

</body>
</html>

{{-- JavaScript - thumbnail click event --}}
<script>
    const mainImage = document.getElementById('mainImage');

    document.querySelectorAll('.thumbnail_img').forEach(thumb => {
        thumb.addEventListener('click', () => {
            mainImage.src = thumb.src;
            mainImage.alt = thumb.alt;
        });
    });
</script>


