{{--}}
Container pre ukazku zoznamu produktov pre jendotlive kategorie
Dany content je pouzity v blade.php suboroch {accessories, diamonds, engagement, watches, art_of_gift, precious_stone}
{{--}}

<div class="product-container">
    @forelse($products as $product)
        <a href="{{ route('productinfo',$product->id) }}">
            <div class="product-card">
                <div class="product-img">
                    <img src="/images/{{ $product->imagename }}" alt="{{ $product->productname }}">
                    <h4 class="prod-name-card">{{ $product->productname }}</h4>
                    <p class="prod-info-card">{{ $product->productdesc }}</p>
                </div>
                <div class="purchase">
                    <span class="prod-price-card">{{ number_format($product->price,2) }}€</span>
                    <form action="{{ route('cart.add') }}" method="POST" style="display:inline">
                        @csrf
                        <input type="hidden" name="productid" value="{{ $product->id }}">
                        <input type="hidden" name="type"      value="{{ $product->type }}">
                        <input type="hidden" name="amount"    value="1">
                        <button class="prod-button" type="submit">Add to Bag</button>
                    </form>
                </div>
            </div>
        </a>
    @empty
        <p>No products were found</p>
    @endforelse
</div>
