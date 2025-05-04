{{--}}
Container pre ukazku filtru produktov
Dany content je pouzity v blade.php suboroch {accessories, diamonds, engagement, watches, art_of_gift, precious_stone}
{{--}}

<!--Filter-->
<div class="product-filter">
    <form id="filter" method="GET">

        {{--Sortovanie--}}
        <h3>Sort By</h3>
        @php $current = request('sort', 'popular'); @endphp

        <p><label><input type="radio" name="sort" value="popular" {{ $current === 'popular'   ? 'checked' : '' }}
                        onchange="this.form.submit()">Most Popular</label></p>

        <p><label><input type="radio" name="sort" value="pricedesc" {{ $current === 'pricedesc' ? 'checked' : '' }}
                onchange="this.form.submit()">Price: High to Low</label></p>

        <p><label><input type="radio" name="sort" value="priceasc" {{ $current === 'priceasc'  ? 'checked' : '' }}
                        onchange="this.form.submit()">Price: Low to High</label></p>




        {{--Filtrovanie--}}
        <h3>Filter By</h3>
        <h3>Category</h3>
        @php $categories = request('category', []); @endphp
        @foreach(['ring'=>'Rings','earring'=>'Earrings','necklace'=>'Necklaces','gift'=>'Gifts','accessory'=>'Accessories'] as $val=>$label)
            <p><label><input type="checkbox" name="category[]" value="{{ $val }}"
                            {{ in_array($val, $categories) ? 'checked' : '' }}
                            onchange="this.form.submit()">{{ $label }}</label></p>
        @endforeach

        <h3>Metal</h3>
        @php $metals = request('metal', []); @endphp
        @foreach([
          'Yellow Gold','White gold','Rose Gold','Platinum','Silver','Stainless steel', 'Other'
        ] as $m)
            <p><label><input type="checkbox" name="metal[]" value="{{ $m }}" {{ in_array($m, $metals) ? 'checked' : '' }}
                            onchange="this.form.submit()">{{ $m }}</label></p>
        @endforeach

        <h3>Paving</h3>
            <p><input type="checkbox" name="paving[]" value="false" onchange="this.form.submit()"
                        {{ in_array('false', request('paving', [])) ? 'checked' : '' }}
                        {{ request('paving[]','false') === 'false' ? '' : 'checked' }}> Non-paved</p>

            <p><input type="checkbox" name="paving[]" value="true" onchange="this.form.submit()"
                        {{ in_array('true', request('paving', [])) ? 'checked' : '' }}
                        {{ request('paving[]','true') === 'true' ? '' : 'checked' }}> Paved</p>
    </form>
</div>