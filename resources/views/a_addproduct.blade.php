<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Maximilian Bumbera">
    <title>Jewellery Store | Admin Page</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>

<body>

@include('includes.header')

<div class="wrapper">
    <div class="content-container">
        <div class="user-info">
            <div class="user-avatar">A</div>
            <div class="user-text">
                <p class="user-name">Hello, Admin</p>
                <p class="user-email">admin@jstore.com</p>
            </div>
            <a href="{{ url('/loginpage') }}" class="logout">LOG OUT</a>
        </div>

        <hr>

        <div class="purchases">
            <h3>Add product</h3>
            <div class="admin-buttons">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('prod.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!--Nazov, popis, cena, obrazok (4ks)-->
                    <label for="prod-name">Product name:</label><br>
                    <input type="text" id="prod-name" name="prod-name" placeholder="Product name"
                           value="{{ old('prod-name', $product->productname ?? '') }}"
                           required>
                    <br><br>

                    <label for="prod-desc">Product description:</label><br>
                    <input type="text" id="prod-desc" name="prod-desc" placeholder="Product description"
                           value="{{ old('prod-desc', $product->productdesc ?? '') }}"
                           required>
                    <br><br>

                    {{--cena: min 0, 0.01 - number format --}}
                    <label for="prod-price">Product price (EUR):</label><br>
                    <input type="number" id="prod-price" name="prod-price" placeholder="Product price"
                           value="{{ old('prod-price', $product->productprice ?? '') }}" step="0.01" min="0"
                           required>
                    <br><br>

                    {{--Obrazky--}}
                    <label for="prod-image">Product image (4 pcs required):</label><br>
                    <input type="file" name="prod-image[]" accept="image/jpeg,image/png,image/svg+xml" multiple required
                            onchange="if(this.files.length!==4){ alert('Please select exactly 4 images.'); this.value = null; }"/>
                    <br><br>

                    {{-- Checkbox - kategoria lebo produkt moze patrit do viacerych kategorii--}}
                    <label for="category">Belongs to categories:</label>
                    @php
                        $fallBack = old('category', $product->categories ?? []);
                        $categories= ['Engagement'=>'engagement',
                            'Diamonds'=>'diamonds',
                            'Precious Stone'=>'precious_stone',
                            'Watches'=>'watches',
                            'Accessories'=>'accessories',
                            'Art Of Gift'=>'art_of_gift'];
                    @endphp
                    @foreach($categories as $label => $val)
                        <br>
                    <input type="checkbox" name="category[]" id="category-{{$val}}" value="{{ $val }}"
                           {{ in_array($label, $fallBack) ? 'checked' : '' }}>
                    <label for="category-{{ $val }}">{{ $label }}</label>

                    @endforeach
                    <br><br>

                    <!-- Combobox - typ -->
                    <label for="type">Product type:</label>
                    <select name="type" id="type" required>
                        <option value="ring">Ring</option>
                        <option value="earrings">Earrings</option>
                        <option value="necklace">Necklace</option>
                        <option value="gift">Gift</option>
                        <option value="accessory">Accessory</option>
                    </select>
                    <br><br>

                    <!-- Combobox - material -->
                    <label for="material">Material type:</label>
                    <select name="material" id="material" required>
                        <option value="Yellow Gold">Yellow Gold</option>
                        <option value="White Gold">White Gold</option>
                        <option value="Rose Gold">Rose Gold</option>
                        <option value="Silver">Silver</option>
                        <option value="Platinum">Platinum</option>
                        <option value="Stainless steel">Stainless Steel</option>
                        <option value="Other">Other</option>
                    </select>
                    <br><br>

                    <!-- Combobox - stone -->
                    <label for="paving">Paving:</label>
                    <select name="paving" id="paving" required>
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>

                    <br><br><br>

                    <!--Button pre pridanie produktu-->
                    <button class="add-button" type="submit">ADD PRODUCT</button>
                </form>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
</body>

</html>
