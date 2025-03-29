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
    <div class="wrapper">

        <!--Header-->
        @include('includes.header')

        <div class="content-container">
            <div class="user-info">
                <div class="user-avatar">A</div> <!-- Centered 'A' in circle -->
                <div class="user-text">
                    <p class="user-name">Hello, Admin</p>
                    <p class="user-email">admin@xyz.com</p>
                </div>
                <a href="{{ url('/loginpage') }}" class="logout">LOG OUT</a>
            </div>

            <hr>

            <div class="purchases">
                <h3>Admin Panel</h3>
                <div class="admin-buttons">
                    <button class="admin-btn">Add Product</button>
                    <button class="admin-btn">Edit Product</button>
                    <button class="admin-btn">Remove Product</button>
                </div>
            </div>
        </div>

        <!--Footer-->
        @include('includes.footer')
    </div>
</body>

</html>
