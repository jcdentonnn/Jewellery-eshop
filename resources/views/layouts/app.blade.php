{{--}}
Template pre zobrazenie stranok s produktami
-- obsahuje: header, footer, main s div-om 'main-container
Autor: Dariia Drobna
{{--}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dariia Drobna">
    <title>Jewellery Store | Accessories</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Ponomar&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <!--Header-->
    @include('includes.header')
    <main>
        <!--Hlavny container pre ukazku produktov-->
        <div class="main-container">
            @yield('content')
        </div>
    </main>

    <!--Footer-->
    @include('includes.footer')
</div>

<script src="/js/script.js" defer></script>

</body>
</html>
