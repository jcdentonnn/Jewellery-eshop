@include('includes.header')

<div class="content-container">
    <div class="user-info">
        <div class="user-avatar"></div>
        <div class="user-text">
            <p class="user-name">Hello, XYZ</p>
            <p class="user-email">xyz@xyz.com</p>
        </div>
        <a href="{{ url('/loginpage') }}" class="logout">LOG OUT</a>
    </div>

    <hr>

    <div class="purchases">
        <h3>Your Purchases</h3>
        <div class="purchase-item">
            <div class="purchase-info">
                <p class="purchase-date">Purchase 21/02/2025</p>
                <p class="purchase-amount">950,56 €</p>
            </div>
            <button class="more-info-btn">MORE</button>
        </div>
    </div>
</div>

@include('includes.footer')


</html>
