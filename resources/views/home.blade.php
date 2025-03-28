<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | Home</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
@include('includes.header')

<!--Carousel-->
<div class="carousel">
    <div class="slide-images-carousel">
        <div class="img-slider"><img src="images/people1.png" alt="People wearing jewellery. AI generated"></div>
        <div class="img-slider"><img src="images/woman_preciousStones.png" alt="Woman with precious stone jewellery. AI generated"></div>
        <div class="img-slider"><img src="images/accessories_woman.png" alt="Woman holding an accessory. AI generated"></div>
        <div class="img-slider"><img src="images/couple1.png" alt="Couple wearing jewellery. AI generated"></div>
        <div class="img-slider"><img src="images/wedding1.png" alt="Couple wearing jewellery. AI generated"></div>
    </div>
</div>

<!-- Button '+ Explore' - scroll na nizsiu cast stranky -->
<div class="carousel-btn">
    <button id="carousel-continue" onClick="document.getElementById('landing-page-2').scrollIntoView();">
    + Explore
    </button>
</div>


<!--Landing page #2-->
<div id="landing-page-2" class="main-container">
    <!--Product showcase-->
    <div class="landing-page-img">
        <img id="landing-page-img" src="/images/jewellery1.png" alt="Jewellery. AI generated">
        <div id="product-info-landing" class="product-info">
            <h1>Traditional and modern - all of our jewellery is exquisite</h1>
            <p>Each design is transcended into live by professionals' craft</p>
        </div>
    </div>
</div>

<!--Ukazka produktov 3ks-->
<div class="various-prod">
    <h1>Choose from our iconic pieces</h1>
    <div class="products">
        <div class="product">
            <a href="{{route('watches')}}"> <img src="images/watch-w1.png" alt="A watch. AI generated"></a>
            <a href="{{route('watches')}}"> <h3>Watches for everyone</h3></a>
            <p>Classic and elegant designs. Durable and waterproof</p>
        </div>

        <div class="product">
            <a href="{{route('engagement')}}"><img src="images/engagementRing-w1.png" alt="Engagement ring. AI generated"></a>
            <a href="{{route('engagement')}}"> <h3>Show your love with a special engagement ring</h3></a>
            <p>Symbol of love and commitment. In gold and silver, any type of stone</p>
        </div>

        <div class="product">
            <a href="{{route('diamonds')}}"><img src="images/earringsD-w1.png" alt="Diamond earrings. AI generated"></a>
            <a href="{{route('diamonds')}}"> <h3>Diamond earrings for her birthday</h3></a>
            <p>The best gift and good dowry. In gold and silver, for any occasion</p>
        </div>
    </div>
</div>

<!--Carousel, animacia-->
<script>
    const carouselContainer = document.querySelector('.carousel');
    const carousel = document.querySelector('.slide-images-carousel');
    let slides = document.querySelectorAll('.img-slider');
    let index = 1;
    const firstClone = slides[0].cloneNode(true);
    const lastClone = slides[slides.length - 1].cloneNode(true);

    firstClone.classList.add('clone');
    lastClone.classList.add('clone');

    carousel.appendChild(firstClone);
    carousel.insertBefore(lastClone, slides[0]);

    slides = document.querySelectorAll('.img-slider');

    function updateCarousel() {
        const slideWidth = slides[0].offsetWidth + 20;
        const containerWidth = carouselContainer.offsetWidth;
        const centerOffset = (slideWidth * index) - (containerWidth / 2) + (slideWidth / 2);
        carousel.style.transition = 'transform 0.5s ease-in-out';
        carousel.style.transform = `translateX(-${centerOffset}px)`;
        slides.forEach(s => s.classList.remove('active'));
        slides[index].classList.add('active');
    }

    carousel.addEventListener('transitionend', () => {
        if (slides[index].classList.contains('clone')) {
            carousel.style.transition = 'none';
            if (index === slides.length - 1) index = 1;
            if (index === 0) index = slides.length - 2;
            const slideWidth = slides[0].offsetWidth + 20;
            const containerWidth = carouselContainer.offsetWidth;
            const centerOffset = (slideWidth * index) - (containerWidth / 2) + (slideWidth / 2);
            carousel.style.transform = `translateX(-${centerOffset}px)`;
            slides.forEach(s => s.classList.remove('active'));
            slides[index].classList.add('active');
        }
    });

    setInterval(() => {
        index++;
        updateCarousel();
    }, 3000);
    window.addEventListener('load', updateCarousel);
    window.addEventListener('resize', updateCarousel);
</script>

</body>

@include('includes.footer')

</html>

