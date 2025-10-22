<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FitLife Gym')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header class="navbar">
    <div class="container nav-container">
        <h1 class="logo">FitLife Gym</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('membership') }}">Membership</a></li>
                <li><a href="{{ route('accessories') }}">Accessories</a></li>
                <li><a href="{{ route('cart') }}">Cart <span id="cart-count" class="cart-count">0</span></a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="content">
    @yield('content')
</main>

<footer class="footer">
    <p>&copy; {{ date('Y') }} FitLife Gym. All rights reserved.</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
