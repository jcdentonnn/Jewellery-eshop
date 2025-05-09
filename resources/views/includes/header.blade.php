<body>
<div class="nav-wrapper">
    <div class="header-wr">
        {{--Nadpis 'Free Delivery'--}}
        <div class="delivery-bar">
            EXPRESS DELIVERY ON EVERY ORDER UNTIL MAY 1ST
        </div>


    <div class="top-bar">
        <div class="left-links">
            <a href="{{ route('contactpage') }}">Contact Us</a>
        </div>
        <a class="store-name" href="{{ route('home') }}">Jewellery store</a>
        <div class="icons">
            <a href="{{ route('user') }}"><img class="icons-img" src="/images/user.png" alt="User"></a>
            <a href="{{ route('shoppingcart') }}"><img class="icons-img" src="/images/shopCart.png"  alt="shopping-cart"></a>
        </div>
    </div>

        {{--Navigation Bar--}}
        <nav class="navbar">
            <ul>
                <li><a href="{{ route('engagement') }}">Engagement</a></li>
                <li><a href="{{ route('diamonds') }}">Diamonds</a></li>
                <li><a href="{{ route('precious_stone') }}">Precious Stone</a></li>
                <li><a href="{{ route('watches') }}">Watches</a></li>
                <li><a href="{{ route('accessories') }}">Accessories</a></li>
                <li><a href="{{ route('art_of_gift') }}">Art of Gift</a></li>
            </ul>

            <div class="search-container">

                {{--Search icon--}}
                <input type="checkbox" id="search-turn" hidden>
                <label for="search-turn" class="search-icon">
                    <img class="icons-img" src="/images/search.png" alt="Search Icon">
                </label>

                {{--Search bar--}}
                <div class="search-bar">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="q" value="{{ old('q', request('q','')) }}" placeholder="Search...">
                        <button type="submit">Find</button>
                    </form>
                    @if(session('error'))
                        <div class="error-box">
                            {{ session('error') }}
                        </div>
                    @endif

                </div>
            </div>
        </nav>
        <div class="nav-underline"></div>
    </div>

    {{--Scrolling chovanie pre header. Scroll dole - schova sa, ak je hodnota > 100px, scroll hode - objavi sa--}}
    <script>
        let lastScroll = 0;
        const header = document.querySelector('.header-wr');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll <= 100) {
                header.classList.remove('hide');
                return;
            }
            if (currentScroll > lastScroll) {
                header.classList.add('hide');
            } else {
                header.classList.remove('hide');
            }
            lastScroll = currentScroll;
        });
    </script>
</div>
</body>
