<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Maximilian Bumbera">
    <title>Edit Product | Admin Page</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>

<body>

@include('includes.header')

<div class="wrapper">
    <div class="content-container">
        <div class="user-header">
            <div class="user-name">
                <h1>Edit Product</h1>
            </div>
        </div>

        <hr>

        <div class="purchases">
            <h3>Edit Product Details</h3>
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

                    <form action="{{ route('edit_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label for="prod-name">Product name:</label><br>
                        <input type="text" id="prod-name" name="prod-name" placeholder="Product name"
                               value="{{ old('prod-name', $product->productname) }}" required>
                        <br><br>

                        <label for="prod-desc">Product description:</label><br>
                        <input type="text" id="prod-desc" name="prod-desc" placeholder="Product description"
                               value="{{ old('prod-desc', $product->productdesc) }}" required>
                        <br><br>

                        <label for="prod-price">Product price (EUR):</label><br>
                        <input type="number" id="prod-price" name="prod-price" placeholder="Product price"
                               value="{{ old('prod-price', $product->price) }}" step="0.01" min="0.01" required>
                        <br><br>

                        <label for="prod-image">Product image (4 pcs required):</label><br>
                        <input type="file" name="prod-image[]" accept="image/jpeg,image/png,image/svg+xml" multiple>
                        <br><br>

                        <label for="category">Belongs to categories:</label><br>
                        @php
                            $existingCategories = $existingCategories ?? [];
                            $categories = [
                                'engagement' => 'Engagement',
                                'diamonds' => 'Diamonds',
                                'precious_stone' => 'Precious Stone',
                                'watches' => 'Watches',
                                'accessories' => 'Accessories',
                                'art_of_gift' => 'Art of Gift'
                            ];
                        @endphp
                        @foreach($categories as $val => $label)
                            <br>
                            <input type="checkbox" name="category[]" id="category-{{$val}}" value="{{ $val }}"
                                    {{ in_array($val, $existingCategories) ? 'checked' : '' }}>
                            <label for="category-{{ $val }}">{{ $label }}</label>
                        @endforeach
                        <br><br>

                        <label for="material">Material type:</label><br>
                        <select name="material" id="material" required>
                            <option value="Yellow Gold" {{ $product->type == 'Yellow Gold' ? 'selected' : '' }}>Yellow Gold</option>
                            <option value="Platinum" {{ $product->type == 'Platinum' ? 'selected' : '' }}>Platinum</option>
                            <option value="Stainless steel" {{ $product->type == 'Stainless steel' ? 'selected' : '' }}>Stainless steel</option>
                            <option value="Silver" {{ $product->type == 'Silver' ? 'selected' : '' }}>Silver</option>
                            <option value="Other" {{ $product->type == 'Other' ? 'selected' : '' }}>Other</option>
                            <option value="White Gold" {{ $product->type == 'White Gold' ? 'selected' : '' }}>White Gold</option>
                        </select>
                        <br><br>

                        <label for="type">Product type:</label><br>
                        <select name="type" id="type" required>
                            <option value="ring" {{ $productType == 'ring' ? 'selected' : '' }}>Ring</option>
                            <option value="earrings" {{ $productType == 'earrings' ? 'selected' : '' }}>Earrings</option>
                            <option value="necklace" {{ $productType == 'necklace' ? 'selected' : '' }}>Necklace</option>
                            <option value="gift" {{ $productType == 'gift' ? 'selected' : '' }}>Gift</option>
                            <option value="accessory" {{ $productType == 'accessory' ? 'selected' : '' }}>Accessory</option>
                        </select>
                        <br><br>

                        <label for="paving">Paving:</label><br>
                        <select name="paving" id="paving" required>
                            <option value="true" {{ $product->paving == 'true' ? 'selected' : '' }}>Yes</option>
                            <option value="false" {{ $product->paving == 'false' ? 'selected' : '' }}>No</option>
                        </select>
                        <br><br>

                        <button class="add-button" type="submit">SAVE CHANGES</button>
                        <button type="button" onclick="window.history.back()">Cancel</button>
                    </form>

            </div>
        </div>
    </div>
</div>

@include('includes.footer')
</body>

</html>
