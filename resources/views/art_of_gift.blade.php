<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | Art Of Gift</title>
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
            <img class="product-image-big" src="/images/titleArtOfGift.png" alt="Art Of Gift. AI generated.">
            <div class="product-info">
                <h2>Art of Gift</h2>
                <p>To give a perfect gift is to know the receiver.
                    It is easier to master the art of picking such a gift with options available here</p>
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
                    { img: "gift1.png", name: "COFFEE MUG IN GREY LOGO COLOUR", info: "Coffee mug with our logo. Simple" },
                    { img: "gift3.png", name: "COFFEE MUG IN ICONIC LOGO COLOUR", info: "Coffee mug with our logo. Simple" },
                    { img: "gift4.png", name: "BASEBALL CAP", info: "For casual outfit lovers" },
                    { img: "gift5.png", name: "JEWELLERY STORE BOOK", info: "Book about out store and its traditions" },
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
                prodListGenerate(4);

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
