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
                <div class="user-avatar">A</div> <!-- Centered 'A' in circle -->
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

                    <!-- Combobox - kategoria -->
                    <label for="category">Product category:</label>
                    <select name="category" id="category">
                        <option value="en">Engagement</option>
                        <option value="di">Diamonds</option>
                        <option value="pr">Precious Stone</option>
                        <option value="wa">Watches</option>
                        <option value="ac">Accessories</option>
                        <option value="ar">Art Of Gift</option>
                    </select>

                    <!-- Combobox - typ -->
                    <label for="type">Product type:</label>
                    <select name="type" id="type">
                        <option value="ring">Ring</option>
                        <option value="earrings">Earrings</option>
                        <option value="necklace">Necklace</option>
                        <option value="bracelet">Bracelet</option>
                        <option value="watch">Watch</option>
                        <option value="other">Other</option>
                    </select>

                    <!-- Combobox - material -->
                    <label for="material">Material:</label>
                    <select name="material" id="material">
                        <option value="y-gold">Yellow Gold</option>
                        <option value="w-gold">White Gold</option>
                        <option value="r-gold">Rose Gold</option>
                        <option value="silver">Silver</option>
                        <option value="platinum">Platinum</option>
                        <option value="other">Other</option>
                    </select>

                    <!-- Combobox - stone -->
                    <label for="stone">Stone:</label>
                    <select name="stone" id="stone">
                        <option value="diamond">Diamond</option>
                        <option value="sapphire">Sapphire</option>
                        <option value="ruby">Ruby</option>
                        <option value="emerald">Emerald</option>
                        <option value="citrine">Citrine</option>
                        <option value="other">Other</option>
                    </select>

                    <!-- todo: Input - photo -->

                    <button class="add-button">ADD</button>
                </div>
            </div>
        </div>

    </div>

    @include('includes.footer')
</body>

</html>
