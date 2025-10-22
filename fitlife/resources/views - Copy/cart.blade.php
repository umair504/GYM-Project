@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background: #f7f7f7;
        color: #333;
    }

    .cart-page {
        width: 90%;
        margin: 60px auto;
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .cart-page h1 {
        font-size: 2.3rem;
        text-align: center;
        margin-bottom: 25px;
        color: #27ae60;
        text-transform: uppercase;
        font-weight: 700;
    }

    #cart-items {
        margin-top: 20px;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        background: #f9f9f9;
    }

    .cart-item h4 {
        margin: 0;
        font-size: 1.1rem;
        color: #222;
    }

    .cart-item p {
        margin: 0;
        color: #555;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .quantity-controls button {
        background: #27ae60;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1rem;
    }

    .quantity-controls button:hover {
        background: #219150;
    }

    .remove-btn {
        background: red;
        color: white;
        border: none;
        padding: 7px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.2s ease;
    }

    .remove-btn:hover {
        background: #c0392b;
    }

    .cart-summary {
        text-align: right;
        margin-top: 30px;
    }

    .cart-summary h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: #27ae60;
    }

    .btn {
        background: #27ae60;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background: #219150;
        transform: scale(1.05);
    }

    /* Empty cart message */
    .empty-cart {
        text-align: center;
        padding: 40px;
        color: #666;
        font-size: 1.2rem;
    }

    @media (max-width: 768px) {
        .cart-item {
            flex-direction: column;
            text-align: center;
        }
        .cart-summary {
            text-align: center;
        }
    }
</style>

<div class="container cart-page">
    <h1>Your Shopping Cart</h1>
    <div id="cart-items"></div>
    <div class="cart-summary">
        <h3>Total: $<span id="cart-total">0.00</span></h3>
        <a href="{{ route('checkout') }}" class="btn">Proceed to Checkout</a>
    </div>
</div>

<script>
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function renderCart() {
        const cartContainer = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        cartContainer.innerHTML = '';

        if (cart.length === 0) {
            cartContainer.innerHTML = '<div class="empty-cart">Your cart is empty. <br> <a href="{{ route('accessories') }}" class="btn" style="margin-top:15px;">Shop Now</a></div>';
            cartTotal.textContent = '0.00';
            updateCartCount();
            return;
        }

        let total = 0;
        cart.forEach((item, index) => {
            const subtotal = item.price * item.quantity;
            total += subtotal;

            const itemDiv = document.createElement('div');
            itemDiv.classList.add('cart-item');
            itemDiv.innerHTML = `
                <h4>${item.name}</h4>
                <div class="quantity-controls">
                    <button onclick="changeQuantity(${index}, -1)">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="changeQuantity(${index}, 1)">+</button>
                </div>
                <p>$${subtotal.toFixed(2)}</p>
                <button class="remove-btn" onclick="removeItem(${index})">Remove</button>
            `;
            cartContainer.appendChild(itemDiv);
        });

        cartTotal.textContent = total.toFixed(2);
        updateCartCount();
    }

    function changeQuantity(index, delta) {
        cart[index].quantity += delta;
        if (cart[index].quantity <= 0) cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    }

    function removeItem(index) {
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    }

    function updateCartCount() {
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCountElement.textContent = totalItems;
        }
    }

    document.addEventListener('DOMContentLoaded', renderCart);
</script>
@endsection
