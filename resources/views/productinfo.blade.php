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

<style>
    .product-container {
        font-family: 'Julius Sans One', sans-serif;
        display: flex;
        gap: 20px;
        padding: 20px;
        max-width: 55%;
        margin: 0 auto;
    }
    .product-gallery {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        align-self: center;
    }

    .main-image {
        width: 100%;
        aspect-ratio: 1 / 1;
        background: #ddd;
    }

    .thumbnail-container {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-top: 10px;
    }
    .thumbnail {
        width: 23%;
        aspect-ratio: 1 / 1;
        background: #ccc;
    }
    .product-details {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
    .product-title {
        font-family: 'Julius Sans One', sans-serif;
        font-weight: normal;
        font-size: 28px;
        margin-top: 20px;
        margin-bottom: 20px;
        white-space: nowrap;
    }
    .product-description {
        font-size: 16px;
        margin-bottom: 40px;
    }

    .product-price {
        font-size: 20px;
        margin-top: 40px;
        text-align: left;
    }

    /* pridat do kosika tlacitko*/
    .addtocartbutton {
        background: black;
        margin-top: 10px;
        font-size: 19px;
        color: white;
        padding: 10px;
        width: 100%;
        border: none;
        cursor: pointer;
    }
    .product-links {
        margin-top: 10px;
        font-size: 14px;
        display: flex;
        gap: 17%;
    }

    .product-select {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        font-family: 'Julius Sans One', sans-serif;
        font-size: 14px;
    }


        @media (max-width: 1200px) {
            .product-container {
                flex-direction: column;
                max-width: 90%;
            }

            .product-details {
                order: 1;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .product-title,
            .product-description,
            .product-price{
                width: 80%;
                text-align: center;
            }

            .addtocartbutton,.product-links{
                width: 50%;
                text-align: center;
            }

            .product-options {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .product-select {
                width: 60%;
                text-align: center;
            }

            .product-options label {
                margin-top: 7px;
                text-align: center;
            }

            .product-links {
                display: flex;
                font-size: 14px;
                flex-direction: row;
                justify-content: space-between;
                gap: 10%;
                flex-wrap: nowrap;
                margin-top: 10px;
            }

            .product-gallery {
                order: 2;
                width: 100%;
                margin-top: 30px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .main-image {
                width: 80%;
                aspect-ratio: 1 / 1;
                background: #ddd;
            }

            .thumbnail-container {
                width: 80%;
                display: flex;
                justify-content: space-between;
                margin-top: 10px;
            }

            .thumbnail {
                width: 24%;
                aspect-ratio: 1 / 1;
                background: #ccc;
            }


</style>