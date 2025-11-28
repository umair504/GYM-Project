@extends('layouts.app')

@section('title', 'Welcome to FitLife Gym')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f7f7f7;
    }

    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1558611848-73f7eb4001a1');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        padding: 120px 20px;
    }

    .hero h1 {
        font-size: 3rem;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .btn-main {
        background: #27ae60;
        color: white;
        padding: 12px 25px;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.3s;
        font-size: 1.1rem;
    }

    .btn-main:hover {
        background: #219150;
        transform: scale(1.05);
    }

    .section {
        padding: 60px 0;
        text-align: center;
        background: white;
        margin: 30px 0;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(134, 126, 126, 0.1);
    }

    .section h2 {
        color: #27ae60;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-size: 2rem;
    }

    .section p {
        color: #555;
        max-width: 700px;
        margin: 0 auto 40px;
        font-size: 1.1rem;
    }

    .home-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        padding: 0 40px;
    }

    .home-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .home-card:hover {
        transform: translateY(-5px);
    }

    .home-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .home-card h3 {
        font-size: 1.2rem;
        margin: 10px 0 5px;
        color: #333;
    }

    .home-card p {
        color: #555;
        margin-bottom: 10px;
    }

    .price {
        color: #27ae60;
        font-weight: bold;
    }

    .btn-small {
        background: #27ae60;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-small:hover {
        background: #219150;
    }
</style>

<div class="hero">
    <h1>Welcome to FitLife Gym</h1>
    <p>Train Hard. Stay Strong. Live Fit.</p>
    <a href="{{ route('membership') }}" class="btn-main">Join Now</a>
</div>

<!-- Popular Accessories Section -->
<div class="section">
    <h2>Popular Accessories</h2>
    <p>Check out some of our top-selling gym equipment to take your workouts to the next level.</p>
    <div class="home-grid">
        <div class="home-card">
            <img src="https://advancefitness.pk/wp-content/uploads/2020/10/IR-92022.jpg" alt="Dumbbells">
            <h3>Dumbbells Set</h3>
            <p class="price">$50</p>
            <button class="btn-small" onclick="addToCart('Dumbbells Set', 50)">Add to Cart</button>
        </div>
        <div class="home-card">
            <img src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1" alt="Barbell">
            <h3>Olympic Barbell</h3>
            <p class="price">$120</p>
            <button class="btn-small" onclick="addToCart('Olympic Barbell', 120)">Add to Cart</button>
        </div>
        <div class="home-card">
            <img src="https://media.biogen.co.za/wp-content/uploads/6009551985488-mens-gym-gloves-black-large.jpg" alt="Gloves">
            <h3>Workout Gloves</h3>
            <p class="price">$20</p>
            <button class="btn-small" onclick="addToCart('Workout Gloves', 20)">Add to Cart</button>
        </div>
    </div>
    <br>
    <a href="{{ route('accessories') }}" class="btn-main">View All Accessories</a>
</div>

<!-- Membership Section -->
<div class="section">
    <h2>Our Memberships</h2>
    <p>Choose from our flexible and affordable gym packages that suit every fitness goal.</p>
    <div class="home-grid">
        <div class="home-card">
            <img src="https://images.unsplash.com/photo-1593079831268-3381b0db4a77" alt="Bronze">
            <h3>Bronze Plan</h3>
            <p>Basic Gym Access</p>
            <p class="price">$20/month</p>
        </div>
        <div class="home-card">
            <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438" alt="Silver">
            <h3>Silver Plan</h3>
            <p>Full Gym Access + Trainer</p>
            <p class="price">$40/month</p>
        </div>
        <div class="home-card">
            <img src="https://images.unsplash.com/photo-1558611848-73f7eb4001a1" alt="Gold">
            <h3>Gold Plan</h3>
            <p>All Facilities + Sauna</p>
            <p class="price">$60/month</p>
        </div>
    </div>
    <br>
    <a href="{{ route('membership') }}" class="btn-main">Explore Memberships</a>
</div>

<script>
    // Add product to cart
    function addToCart(name, price) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existing = cart.find(item => item.name === name);
        if (existing) {
            existing.quantity++;
        } else {
            cart.push({ name, price, quantity: 1 });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(`${name} added to cart! 🛒`);
    }
</script>
@endsection
