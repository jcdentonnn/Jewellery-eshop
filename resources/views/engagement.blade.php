<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | Engagement</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <!--Header-->
    @include('includes.header')

    <!--Hlavny container pre ukazku produktov-->
    <div class="main-container">
        <!--Product showcase-->
        <div class="product-showcase">
                <img class="product-image-big" src="/images/titleRings.png" alt="Engagement rings. AI generated.">
            <div class="product-info">
                <h2>Engagement</h2>
                <p>The most important gift before stepping into a new chapter of your life</p>
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
            <div class="product-container" id="productList"></div>
            <script>
                const baseProducts = [
                    { img: "diamondring1.png", name: "DIAMOND RING", info: "2-carat diamond ring with 10 0.5-carat diamonds in white gold" },
                    { img: "ring1.png", name: "YELLOW GOLD RING", info: "Ring in 585 yellow gold" },
                    { img: "diamondring2.png", name: "DIAMOND RING", info: "2.5-carat diamond ring in platinum" },
                    { img: "ring2.png", name: "YELLOW GOLD RING", info: "Ring in 585 yellow gold with engraving" },
                    { img: "ring3.png", name: "SILVER RING", info: "Silver 945 ring" },
                    { img: "ring4.png", name: "ROSE GOLD RING", info: "Ring in 585 rose gold" },
                    { img: "ring5.png", name: "YELLOW GOLD RING", info: "A narrow-cut ring in 585 yellow gold" },
                    { img: "ring6.png", name: "YELLOW GOLD CITRINE RING", info: "3.5-carat citrine ring in 585 yellow gold" },
                    { img: "ring7.png", name: "SAPPHIRE WHITE GOLD RING WITH DIAMONDS", info: "4-carat sapphire ring with 20 0.5-carat diamonds in white gold with engraving" },
                    { img: "ring8.png", name: "DIAMOND RING", info: "1-carat diamond ring in platinum" },
                    { img: "ring9.png", name: "RUBY RING", info: "1-carat ruby ring in 954 silver" },
                    { img: "ring11.png", name: "EMERALD YELLOW GOLD RING", info: "3.5-carat emerald ring in 585 yellow gold" },
                    { img: "ring10.png", name: "EMERALD ROSE GOLD RING", info: "3.5-carat emerald ring in 585 rose gold" },
                    { img: "ring12.png", name: "SAPPHIRE PLATINUM RING", info: "Sapphire ring in platinum with engraving" },
                    { img: "diamondring3.png", name: "DIAMOND RING", info: "3-carat diamond ring with in white gold" },
                    { img: "diamondring4.png", name: "DIAMOND RING", info: "3-carat diamond ring with in platinum" }
                ];
                const productInfoLink = "{{ route('productinfo') }}";

                function prodListGenerate(maxProducts = 20) {
                    const container = document.getElementById("productList");
                    let productHTML = "";

                    for (let i = 0; i < maxProducts; i++) {
                        const product = baseProducts[i % baseProducts.length];
                        productHTML += `
                        <a href="${productInfoLink}">
                            <div class="product-card">
                                <div class="product-img">
                                    <img src="/images/${product.img}" alt="${product.name}">
                                    <h4 class="prod-name-card">${product.name}</h4>
                                    <p class="prod-info-card">${product.info}</p>
                                </div>
                                <div class="purchase">
                                    <span class="prod-price-card">999.99€</span>
                                    <button class="prod-button" type="button">Add to Bag</button>
                                </div>
                            </div>
                        </a>
                    `;
                    }
                    container.innerHTML = productHTML;
                }
                prodListGenerate(20);

                //schovanie a ukazanie filtru pri @media
                const toggleBtn = document.getElementById('turnFilterBtn');
                const filter = document.querySelector('.product-filter');

                toggleBtn.addEventListener('click', () => {
                    filter.classList.toggle('show');
                    toggleBtn.textContent = filter.classList.contains('show') ? 'Hide Filter' : 'Show Filter';
                });
            </script>
        </div>
    </div>
    <!--Footer-->
    @include('includes.footer')
</div>
</body>

</html>
