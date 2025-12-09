@extends('layouts.app')

@section('title', 'Membership Plans')

@section('content')
<style>
    /* Your existing CSS styles here */
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background: #f7f7f7ff;
        color: #333;
    }
    main {
        flex: 1; 
    }

    .membership-page {
        width: 90%;
        margin: 60px auto;
        text-align: center;
    }
    
    /* Cart Notification Styling */
    #cart-notification {
        display: none;
        position: fixed;
        top: 80px;
        right: 20px;
        background: #27ae60;
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        font-weight: 600;
        animation: fadeInOut 1.5s ease;
    }
    
    @keyframes fadeInOut {
        0% { opacity: 0; transform: translateY(-10px); }
        20% { opacity: 1; transform: translateY(0); }
        80% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(-10px); }
    }
    
    /*Membership Packages */
    .membership-page h1 {
        font-size: 2.5rem;
        margin-bottom: 30px;
        color: #27ae60;
        font-weight: 700;
        text-transform: uppercase;
    }

    .membership-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(168, 14, 14, 0.1);
        transition: all 0.3s ease;
        position: relative;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .card h2 {
        font-size: 1.8rem;
        margin-bottom: 10px;
        color: #222;
        text-transform: uppercase;
    }
    
    /*price per month   */
    .card p {
        font-size: 1.2rem;
        font-weight: 600;
        color: #a38bb6ff;
        margin-bottom: 15px;
    }

    .card ul {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }
    
    /* info about packages  */
    .card ul li {
        margin: 8px 0;
        color: #555;
    }

    .btn {
        background: #27ae60;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn:hover {
        background: #219150;
        transform: scale(1.05);
    }

    /* Color themes for each card */
    .bronze { border-top: 6px solid #cd7f32; }
    .silver { border-top: 6px solid #c0c0c0; }
    .gold { border-top: 6px solid #ffd700; }
    .platinum { border-top: 6px solid #6ea3b1ff; }
    .vip { border-top: 6px solid #4a28a8ff; }
    .diamond { border-top: 6px solid #2a8022ff; }
    .elite { border-top: 6px solid #aa400eff; }
    .diamond-elite { border-top: 6px solid #111111ff; }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .membership-page h1 {
            font-size: 2rem;
        }
        .card {
            padding: 20px;
        }
        #cart-notification {
            top: 60px;
            right: 10px;
            left: 10px;
            text-align: center;
        }
    }
</style>

<!-- Cart Notification Element -->
<div id="cart-notification">✓ Added to cart!</div>

<!-- ... existing CSS and HTML ... -->

<div class="container membership-page">
    <h1>Membership Packages</h1>
    
    @if($plans->isEmpty())
        <div class="alert alert-info">
            <p>No membership plans available at the moment. Please check back later.</p>
        </div>
    @else
        <div class="membership-grid">
            @foreach($plans as $plan)
                <div class="card {{ $plan->color_class ?? '' }}">
                    <h2>{{ $plan->name }}</h2>
                    <p>${{ number_format($plan->price, 2) }}/{{ $plan->duration }}</p>
                    
                    @if($plan->description)
                        <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">
                            {{ $plan->description }}
                        </p>
                    @endif
                    
                    <ul>
                        @foreach($plan->features_array as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                    
                    <button class="btn" onclick="addToCart('{{ $plan->name }} Membership', {{ $plan->price }})">
                        Choose {{ $plan->name }}
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- ... existing JavaScript ... -->

<script>
    // Initialize cart
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function addToCart(name, price) {
        const existingItem = cart.find(item => item.name === name);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ 
                name, 
                price, 
                quantity: 1,
                addedAt: new Date().toISOString()
            });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        showCartNotification(name);
        updateCartCount();
    }

    function showCartNotification(itemName) {
        const notification = document.getElementById('cart-notification');
        if (notification) {
            notification.textContent = `✓ ${itemName} added to cart!`;
            notification.style.display = 'block';
            
            // Reset animation
            notification.style.animation = 'none';
            setTimeout(() => {
                notification.style.animation = 'fadeInOut 1.5s ease';
            }, 10);
            
            setTimeout(() => {
                notification.style.display = 'none';
            }, 1500);
        }
    }

    function updateCartCount() {
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCountElement.textContent = totalItems;
            
            // Add animation to cart count
            cartCountElement.style.transform = 'scale(1.3)';
            setTimeout(() => {
                cartCountElement.style.transform = 'scale(1)';
            }, 300);
        }
    }

    // Initialize cart count on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateCartCount();
        
        // Add visual feedback on button click
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                // Add click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);
            });
        });
    });
</script>
@endsection