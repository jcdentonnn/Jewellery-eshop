<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery Store</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>
<body>

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
