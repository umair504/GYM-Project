@extends('layouts.app')

@section('title', 'Gym Accessories')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background: #f7f7f7;
        color: #333;
    }

    .accessories-page {
        width: 90%;
        margin: 60px auto;
        text-align: center;
    }

    .accessories-page h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: #27ae60;
        font-weight: 700;
        text-transform: uppercase;
    }

    .accessories-page p {
        font-size: 1.1rem;
        margin-bottom: 40px;
        color: #555;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        text-align: center;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-card img {
        width: 100%;
        height: 200px;
        border-radius: 10px;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .product-card h3 {
        margin: 10px 0;
        font-size: 1.4rem;
        color: #222;
    }

    .price {
        color: #27ae60;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    .product-card button {
        background: #27ae60;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .product-card button:hover {
        background: #219150;
        transform: scale(1.05);
    }

    /* Cart notification styling */
    .cart-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: #27ae60;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        display: none;
        font-weight: 500;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        z-index: 9999;
    }

    @media (max-width: 768px) {
        .accessories-page h1 {
            font-size: 2rem;
        }
        .product-card img {
            height: 180px;
        }
    }
</style>

<div class="container accessories-page">
    <h1>Gym Accessories for Sale</h1>
    <p>Upgrade your workouts with high-quality equipment from FitLife Gym!</p>

    <div class="product-grid">
        <!-- Product 1 -->
        <div class="product-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStsuxFx_26d4iKsumigu0MaVLkM0y6mxqvGw&s" alt="Dumbbells">
            <h3>Dumbbells Set</h3>
            <p>Perfect for strength training at home or the gym.</p>
            <p class="price">$50</p>
            <button onclick="addToCart('Dumbbells Set', 50, 'https://images.unsplash.com/photo-1579758629939-037fdd6b88c8')">Add to Cart</button>
        </div>

        <!-- Product 2 -->
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1" alt="Barbell">
            <h3>Olympic Barbell</h3>
            <p>Heavy-duty barbell for serious lifters.</p>
            <p class="price">$120</p>
            <button onclick="addToCart('Olympic Barbell', 120, 'https://images.unsplash.com/photo-1605296867304-46d5465a13f1')">Add to Cart</button>
        </div>

        <!-- Product 3 -->
        <div class="product-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHRhGmxCPMDHB7YALaZX2pfXOQDwKHD40Q9A&s" alt="Plates">
            <h3>Weight Plates</h3>
            <p>Durable steel plates available in multiple weights.</p>
            <p class="price">$80</p>
            <button onclick="addToCart('Weight Plates', 80, 'https://images.unsplash.com/photo-1605296867424-35fc25c92101')">Add to Cart</button>
        </div>

        <!-- Product 4 -->
        <div class="product-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYFF5KbjGEU00k8rqvTOlaULJybv8v2cSB7Q&s" alt="Machine">
            <h3>Multi Gym Machine</h3>
            <p>Full body workout station for home or gym use.</p>
            <p class="price">$450</p>
            <button onclick="addToCart('Multi Gym Machine', 450, 'https://images.unsplash.com/photo-1583454110559-21d8e1a1a2d3')">Add to Cart</button>
        </div>

        <!-- Product 5 -->
        <div class="product-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxzBEpLIAyu-iIvvfUcg_M5aChLMOyQdkAdw&s" alt="Resistance Bands">
            <h3>Resistance Bands Set</h3>
            <p>Compact and portable for strength and mobility training.</p>
            <p class="price">$25</p>
            <button onclick="addToCart('Resistance Bands Set', 25, 'https://images.unsplash.com/photo-1610430537406-9adf5ff8e630')">Add to Cart</button>
        </div>

        <!-- Product 6 -->
        <div class="product-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSATdXobRMIfUShpnA4oDl3URNRrmNe871nvA&s" alt="Kettlebell">
            <h3>Kettlebell</h3>
            <p>Ideal for functional fitness and cardio workouts.</p>
            <p class="price">$60</p>
            <button onclick="addToCart('Kettlebell', 60, 'https://images.unsplash.com/photo-1605296867304-46d5465a13f1')">Add to Cart</button>
        </div>

        <!-- Product 7 -->
        <div class="product-card">
            <img src="https://www.elitefts.com/media/catalog/product/cache/36d7bfb33e8965fc8880f222555067c7/t/a/ta128_1.jpg" alt="Jump Rope">
            <h3>Speed Jump Rope</h3>
            <p>Improve stamina and coordination with this lightweight rope.</p>
            <p class="price">$15</p>
            <button onclick="addToCart('Speed Jump Rope', 15, 'https://images.unsplash.com/photo-1605296867304-46d5465a13f1')">Add to Cart</button>
        </div>

        <!-- Product 8 -->
        <div class="product-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_2aVMJU1UAgTGBgCrmg5pb7OhdI8-najicQ&s" alt="Gloves">
            <h3>Workout Gloves</h3>
            <p>Protect your hands and improve grip during lifts.</p>
            <p class="price">$20</p>
            <button onclick="addToCart('Workout Gloves', 20, 'https://images.unsplash.com/photo-1598970434795-0c54fe7c0642')">Add to Cart</button>
        </div>

        <!-- Product 9 -->
        <div class="product-card">
            <img src="https://m.media-amazon.com/images/I/31rlkB1gwwL._SR290,290_.jpg" alt="Mat">
            <h3>Yoga Mat</h3>
            <p>Non-slip and durable mat for yoga and stretching.</p>
            <p class="price">$30</p>
            <button onclick="addToCart('Yoga Mat', 30, 'https://images.unsplash.com/photo-1599058917212-d750089bc07a')">Add to Cart</button>
        </div>

        <!-- Product 10 -->
        <div class="product-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcgyOAAmzhO2OFXv_m5-26_SGuqmYwGAuprg&s" alt="Gym Bag">
            <h3>Gym Bag</h3>
            <p>Spacious and stylish bag to carry all your gear.</p>
            <p class="price">$45</p>
            <button onclick="addToCart('Gym Bag', 45, 'https://images.unsplash.com/photo-1617089260923-56c4b6b9e94d')">Add to Cart</button>
        </div>

        <!-- Product 11 -->
        <div class="product-card">
            <img src="https://m.media-amazon.com/images/I/41rU4iv7-nL._AC_US1000_.jpg" alt="Towel">
            <h3>Gym Towel</h3>
            <p>Soft, absorbent towel ideal for intense workouts.</p>
            <p class="price">$10</p>
            <button onclick="addToCart('Gym Towel', 10, 'https://images.unsplash.com/photo-1598970434795-0c54fe7c0642')">Add to Cart</button>
        </div>
    </div>
</div>

<div id="cart-notification" class="cart-notification">
    Item added to cart!
</div>

<script>
    // Initialize cart from localStorage or empty
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function addToCart(name, price) {
        const existingItem = cart.find(item => item.name === name);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ name, price, quantity: 1 });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        showCartNotification();

        // Optional: update cart count in navbar
        updateCartCount();
    }

    function showCartNotification() {
        const notification = document.getElementById('cart-notification');
        notification.style.display = 'block';
        setTimeout(() => {
            notification.style.display = 'none';
        }, 1500);
    }

    function updateCartCount() {
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCountElement.textContent = totalItems;
        }
    }

    // Update cart count on page load
    document.addEventListener('DOMContentLoaded', updateCartCount);
</script>
@endsection
