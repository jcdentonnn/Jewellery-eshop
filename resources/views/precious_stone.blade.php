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
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

@include('includes.header')


<!--Hlavny container pre ukazku produktov-->
<div class="main-container">
    <!--Product showcase-->
    <div class="product-showcase">
        <img id="product-image-big" src="/images/img.png" alt="Diamonds">
        <div class="product-info">
            <h2>Precious Stone Jewellery</h2>
            <p>Discover pieces with extraordinary stones which will express your identity</p>
        </div>
    </div>

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
        <div class="product-container" id="productList"></div>
        <!--todo: premiestnit do .js suboru-->
        <script>
            const baseProducts = [
                { img: "img.png", name: "EARRINGS", info: "Info about the earrings" },
                { img: "img.png", name: "RING", info: "Info about the ring" },
                { img: "img.png", name: "NECKLACE", info: "Info about the necklace" },
                { img: "img.png", name: "CUFFLINKS", info: "Info about the necklace" }
            ];

            function prodListGenerate(maxProducts = 20) {
                const container = document.getElementById("productList");
                let productHTML = "";

                for (let i = 0; i < maxProducts; i++) {
                    const product = baseProducts[i % baseProducts.length];
                    productHTML += `
                    <div class="product-card">
                        <img src="/images/${product.img}" alt="${product.name}">
                        <h4 class="prod-name-card">${product.name} ${i + 1}</h4>
                        <p class="prod-info-card">${product.info}</p>
                        <button class="prod-button" type="button">Add to Bag</button>
                    </div>
                `;
                }

                container.innerHTML = productHTML;
            }
            prodListGenerate(20);
        </script>
    </div>
</div>
</body>

@include('includes.footer')

</html>
