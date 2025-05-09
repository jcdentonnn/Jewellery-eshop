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
</head>

<body>
<div class="wrapper">
    {{--Header--}}
    @include('includes.header')

    {{--Carousel--}}
    <div class="carousel">
        <div class="slide-images-carousel">
            <div class="img-slider"><img src="images/people1.png" alt="People wearing jewellery. AI generated"></div>
            <div class="img-slider"><img src="images/woman_preciousStones.png" alt="Woman with precious stone jewellery. AI generated"></div>
            <div class="img-slider"><img src="images/accessories_woman.png" alt="Woman holding an accessory. AI generated"></div>
            <div class="img-slider"><img src="images/couple1.png" alt="Couple wearing jewellery. AI generated"></div>
            <div class="img-slider"><img src="images/wedding1.png" alt="Couple wearing jewellery. AI generated"></div>
        </div>
    </div>

    {{--Button '+ Explore' - scroll na nizsiu cast stranky--}}
    <div class="carousel-btn">
        <button id="carousel-continue" onClick="document.getElementById('landing-page-2').scrollIntoView();">
        + Explore
        </button>
    </div>


    {{--Landing page #2--}}
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

    <hr>

    {{--Ukazka produktov 3ks--}}
    <div class="various-prod">
        <h1>Choose from our iconic pieces</h1>
        <div class="products">
            <div class="product">
                <a href="{{route('watches')}}"> <img src="images/watch-w1.png" alt="A watch. AI generated"></a>
                <div class="product-text">
                    <a href="{{route('watches')}}"> <h3>Watches for everyone</h3></a>
                    <p>Classic and elegant designs. Durable and waterproof</p>
                </div>
            </div>

            <div class="product">
                <a href="{{route('engagement')}}"><img src="images/engagementRing-w1.png" alt="Engagement ring. AI generated"></a>
                <div class="product-text">
                    <a href="{{route('engagement')}}"> <h3>Show your love with a special engagement ring</h3></a>
                    <p>Symbol of love and commitment. In gold and silver, any type of stone</p>
                </div>
            </div>

            <div class="product">
                <a href="{{route('diamonds')}}"><img src="images/earringsD-w1.png" alt="Diamond earrings. AI generated"></a>
                <div class="product-text">
                    <a href="{{route('diamonds')}}"> <h3>Diamond earrings for her birthday</h3></a>
                    <p>The best gift and good dowry. In gold and silver, for any occasion</p>
                </div>
            </div>
        </div>
    </div>

    {{--Carousel, animacia--}}
    <script>
        const carouselContainer = document.querySelector('.carousel');
        const carouselImages = document.querySelector('.slide-images-carousel');
        let originalCarouselArr = Array.from(carouselImages.children);
        const arrCnt = originalCarouselArr.length;

        //klonovanie obrazkov reverzne a pridanie na zaciatok pre efekt endless scroll-u.
        //[K1],[Img],[K2]
        originalCarouselArr.slice().reverse().forEach(slide => {
            const clone = slide.cloneNode(true);
            clone.classList.add('clone');
            carouselImages.insertBefore(clone, carouselImages.firstChild);
        });

        originalCarouselArr.forEach(slide => {
            const clone = slide.cloneNode(true);
            clone.classList.add('clone');
            carouselImages.appendChild(clone);
        });

        //array obrazkov po pridani klonov
        let addedImages = Array.from(carouselImages.children);
        const startIndex = arrCnt;
        let index = startIndex;

        //offset pre posun obrazkov - slide-ov
        function getSlideOffset() {
            return addedImages[0].offsetWidth + 15;
        }

        //funkcia na posun na konkretny slide s indexom i a jeho centrovanie pomocou getSlideOffset()
        function scrollToSlide(i, smooth = true) {
            const offset = getSlideOffset();
            const containerWidth = carouselContainer.offsetWidth;
            const centerOffset = (offset * i) - (containerWidth / 2) + (offset / 2);

            carouselImages.style.transition = smooth ? 'transform 0.5s ease-in-out' : 'none';
            carouselImages.style.transform = `translateX(-${centerOffset}px)`;
        }

        //podsvietenie slide-u - na zaklade atributu active
        function updateActive() {
            const whichActive = (index - startIndex) % arrCnt;
            addedImages.forEach((slide, i) => {
                if (i >= startIndex && i < startIndex + arrCnt) {
                    slide.classList.toggle('active', (i - startIndex) === whichActive);
                } else {
                    slide.classList.remove('active');
                }
            });
        }

        //automaticke slide-ovanie kazdych 3s
        function autoSlide() {
            index++;
            scrollToSlide(index);
            updateActive();

            //posledny index - reset na startIndex bez animacie, pre iluziu nekonecneho slidu
            if (index >= startIndex + arrCnt) {
                setTimeout(() => {
                    index = startIndex;
                    scrollToSlide(index, false);
                    updateActive();
                }, 500);
            }
            if (index < startIndex) {
                setTimeout(() => {
                    index = startIndex + arrCnt - 1;
                    scrollToSlide(index, false);
                    updateActive();
                }, 500);
            }
        }

        //onLoad
        window.addEventListener('load', () => {
            scrollToSlide(index, false);
            updateActive();
        });

        //responzivita
        window.addEventListener('resize', () => {
            scrollToSlide(index, false);
            updateActive();
        });

        //sliding kazdych 3s
        setInterval(autoSlide, 3000);
    </script>

    {{--Footer--}}
    @include('includes.footer')
</div>

</body>
</html>

