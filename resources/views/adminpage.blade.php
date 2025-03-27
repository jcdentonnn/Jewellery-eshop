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

@include('includes.footer')
</html>
