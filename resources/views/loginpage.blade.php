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
<div class="wrapper">

@include('includes.header')

<div class="register-container">
    <h2>Login</h2>

    @if ($errors->any())
        <div style="color: red">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <p>Don't have an account yet? <a href="{{ url('/registerpage') }}">Create account</a></p>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">SIGN IN</button>
    </form>
</div>


@include('includes.footer')
</div>
</body>

</html>
