{{--}}
Container pre ukazku zoznamu produktov pre jendotlive kategorie
Dany content je pouzity v blade.php suboroch {accessories, diamonds, engagement, watches, art_of_gift, precious_stone}
{{--}}

<div class="wr">
    <div class="product-container">
        @php
            $user = null;
            if (session('user_id')) {
                $user = DB::table('users')->find(session('user_id'));
            }
        @endphp

        @forelse($products as $product)
            <div class="product-card">
                <div class="product-img">
                    <a href="{{ route('productinfo',$product->id) }}">
                        <img src="/images/{{ $product->imagename }}" alt="{{ $product->productname }}">
                        <h4 class="prod-name-card">{{ $product->productname }}</h4>
                        <p class="prod-info-card">{{ $product->productdesc }}</p>
                    </a>
                </div>

                <div class="purchase">
                    <span class="prod-price-card">{{ number_format($product->price,2) }}€</span>

                    @if($user && $user->isadmin)
                        <div class="admin-buttons-prod">
                            <button class="admin-btn-single edit">Edit</button>
                            <button class="delete-btn">Delete</button> <!-- Remove the form here -->
                        </div>
                    @else
                        <form action="{{ route('cart.add') }}" method="POST" style="display:inline">
                            @csrf
                            <input type="hidden" name="productid" value="{{ $product->id }}">
                            <input type="hidden" name="type" value="{{ $product->type }}">
                            <input type="hidden" name="amount" value="1">
                            <button class="prod-button" type="submit">Add to Bag</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <p>Sorry, no products were found</p>
        @endforelse
    </div>


    <div class="paginate-wrap">
        {{-- Paginate --}}
        @if($products->hasPages())
            {{ $products->links() }}
        @endif
    </div>
</div>
