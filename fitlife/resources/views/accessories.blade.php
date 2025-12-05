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

    /* Reviews Section */
    .reviews-section {
        background: white;
        border-radius: 12px;
        margin-top: 70px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
    }

    .reviews-section h2 {
        text-align: center;
        color: #27ae60;
        font-size: 2rem;
        margin-bottom: 30px;
    }

    .review {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
    }

    .review:last-child {
        border-bottom: none;
    }

    .review h4 {
        margin: 0;
        font-size: 1.1rem;
        color: #333;
    }

    .review p {
        margin: 5px 0;
        color: #555;
    }

    .stars {
        color: #f1c40f;
        margin-bottom: 5px;
    }

    .add-review {
        margin-top: 40px;
        text-align: center;
    }

    .add-review input,
    .add-review textarea,
    .add-review select {
        width: 80%;
        max-width: 500px;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .add-review button {
        background: #27ae60;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
    }

    .add-review button:hover {
        background: #219150;
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
        <!-- Fetch products dynamically from database -->
        @php
            use App\Models\Product;
            $products = Product::all();
        @endphp

        @foreach ($products as $p)
            <div class="product-card">
                <img src="{{ $p->image_url }}" alt="{{ $p->name }}">
                <h3>{{ $p->name }}</h3>
                <p class="price">${{ $p->price }}</p>
                <button onclick="addToCart('{{ $p->name }}', {{ $p->price }})">Add to Cart</button>
            </div>
        @endforeach
    </div>
</div>

<!-- ✅ REVIEWS SECTION -->
<div class="reviews-section">
    <h2>Customer Reviews</h2>
    <div id="reviews-list">
        <div class="review">
            <h4>Ali Khan</h4>
            <div class="stars">★★★★★</div>
            <p>"Amazing quality accessories! The dumbbells are perfect for my home gym."</p>
        </div>
        <div class="review">
            <h4>Sara Ahmed</h4>
            <div class="stars">★★★★☆</div>
            <p>"Loved the yoga mat! Comfortable and durable. Delivery was quick too."</p>
        </div>
        <div class="review">
            <h4>Usman Tariq</h4>
            <div class="stars">★★★★★</div>
            <p>"Barbell set is top-notch. Definitely worth the price."</p>
        </div>
    </div>

    <!-- Add Review Form -->
    <div class="add-review">
        <h3>Leave a Review</h3>
        <input type="text" id="reviewer-name" placeholder="Your Name" required><br>
        <select id="review-rating">
            <option value="5">★★★★★ - Excellent</option>
            <option value="4">★★★★☆ - Good</option>
            <option value="3">★★★☆☆ - Average</option>
            <option value="2">★★☆☆☆ - Poor</option>
            <option value="1">★☆☆☆☆ - Very Bad</option>
        </select><br>
        <textarea id="review-text" placeholder="Write your review..." rows="4" required></textarea><br>
        <button onclick="addReview()">Submit Review</button>
    </div>
</div>

<div id="cart-notification" class="cart-notification">
    Item added to cart!
</div>

<script>
    // Initialize cart
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

    // ✅ Add Review Function
    function addReview() {
        const name = document.getElementById('reviewer-name').value;
        const rating = document.getElementById('review-rating').value;
        const text = document.getElementById('review-text').value;

        if (!name || !text) {
            alert('Please fill all fields.');
            return;
        }

        const stars = '★'.repeat(rating) + '☆'.repeat(5 - rating);

        const newReview = document.createElement('div');
        newReview.classList.add('review');
        newReview.innerHTML = `
            <h4>${name}</h4>
            <div class="stars">${stars}</div>
            <p>"${text}"</p>
        `;

        document.getElementById('reviews-list').appendChild(newReview);
        document.getElementById('reviewer-name').value = '';
        document.getElementById('review-text').value = '';
    }

    document.addEventListener('DOMContentLoaded', updateCartCount);
</script>
@endsection
