@include('includes.header')

<div class="register-container">
    <h2>Register</h2>
    <form>
        <p>Already have an account? <a href="{{ url('/loginpage') }}">Create account</a></p>

        <input type="text" placeholder="First name" required>
        <input type="text" placeholder="Last name" required>
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Password" required>
        <button type="submit">CREATE ACCOUNT</button>
    </form>
</div>

</body>

@include('includes.footer')

</html>
