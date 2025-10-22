@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background: #f7f7f7;
        color: #333;
    }

    .checkout-page {
        width: 90%;
        max-width: 750px;
        margin: 60px auto;
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .checkout-page h1 {
        font-size: 2.3rem;
        color: #27ae60;
        text-align: center;
        font-weight: 700;
        margin-bottom: 25px;
        text-transform: uppercase;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: 600;
        margin-top: 10px;
        color: #444;
    }

    input, select {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #27ae60;
        box-shadow: 0 0 6px rgba(39, 174, 96, 0.3);
    }

    #checkout-items {
        list-style: none;
        padding: 0;
        margin-top: 10px;
    }

    #checkout-items li {
        background: #f2f2f2;
        padding: 10px 15px;
        margin-bottom: 10px;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        font-weight: 500;
    }

    .total {
        text-align: right;
        font-size: 1.3rem;
        font-weight: 700;
        margin-top: 10px;
    }

    .btn {
        background: #27ae60;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        margin-top: 15px;
    }

    .btn:hover {
        background: #219150;
        transform: scale(1.05);
    }

    .payment-section {
        background: #f8f8f8;
        padding: 15px;
        border-radius: 8px;
        margin-top: 20px;
    }

    .payment-option {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .success-message {
        display: none;
        text-align: center;
        background: #27ae60;
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin-top: 20px;
        animation: fadeIn 0.5s ease-in-out;
        font-weight: 500;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
        .checkout-page {
            padding: 25px;
        }
        .checkout-page h1 {
            font-size: 2rem;
        }
    }
</style>

<div class="container checkout-page">
    <h1>Checkout</h1>
    <form id="checkout-form">
        <label>Full Name</label>
        <input type="text" id="name" placeholder="Enter your full name" required>

        <label>Email</label>
        <input type="email" id="email" placeholder="Enter your email" required>

        <label>Address</label>
        <input type="text" id="address" placeholder="Enter your delivery address" required>

        <h3>Order Summary</h3>
        <ul id="checkout-items"></ul>

        <h3 class="total">Total: $<span id="checkout-total">0.00</span></h3>

        <div class="payment-section">
            <h3>Payment Method</h3>
            <div class="payment-option">
                <input type="radio" id="cod" name="payment" value="cod" checked>
                <label for="cod">Cash on Delivery (COD)</label>
            </div>
            <div class="payment-option">
                <input type="radio" id="online" name="payment" value="online">
                <label for="online">Online Payment (Card / Wallet)</label>
            </div>

            <div id="online-payment-fields" style="display: none;">
                <label>Card Number</label>
                <input type="text" id="card-number" placeholder="1234 5678 9012 3456">

                <label>Expiry Date</label>
                <input type="text" id="expiry" placeholder="MM/YY">

                <label>CVV</label>
                <input type="text" id="cvv" placeholder="123">
            </div>
        </div>

        <button type="submit" class="btn">Place Order</button>
    </form>

    <div id="success-message" class="success-message">
        ✅ Your order has been placed successfully! Thank you for shopping with FitLife Gym.
    </div>
</div>

<script>
    // Load cart data from localStorage
    document.addEventListener("DOMContentLoaded", function() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let total = 0;
        const list = document.getElementById("checkout-items");

        list.innerHTML = "";
        cart.forEach(item => {
            const li = document.createElement("li");
            li.textContent = `${item.name} — $${item.price.toFixed(2)}`;
            list.appendChild(li);
            total += item.price;
        });

        document.getElementById("checkout-total").textContent = total.toFixed(2);
    });

    // Payment field toggle
    document.querySelectorAll("input[name='payment']").forEach(radio => {
        radio.addEventListener("change", function() {
            const onlineFields = document.getElementById("online-payment-fields");
            if (this.value === "online") {
                onlineFields.style.display = "block";
            } else {
                onlineFields.style.display = "none";
            }
        });
    });

    // Handle checkout form
    document.getElementById("checkout-form").addEventListener("submit", function(e) {
        e.preventDefault();

        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const address = document.getElementById("address").value.trim();
        const paymentMethod = document.querySelector("input[name='payment']:checked").value;

        if (!name || !email || !address) {
            alert("Please fill in all fields before proceeding.");
            return;
        }

        if (paymentMethod === "online") {
            const card = document.getElementById("card-number").value.trim();
            const expiry = document.getElementById("expiry").value.trim();
            const cvv = document.getElementById("cvv").value.trim();

            if (!card || !expiry || !cvv) {
                alert("Please fill out all card details for online payment.");
                return;
            }

            alert("Processing online payment... 💳");
        }

        // Simulate order success
        document.getElementById("success-message").style.display = "block";

        // Clear form and cart
        localStorage.removeItem("cart");
        document.getElementById("checkout-form").reset();

        // Hide message after few seconds
        setTimeout(() => {
            document.getElementById("success-message").style.display = "none";
        }, 5000);
    });
</script>
@endsection
