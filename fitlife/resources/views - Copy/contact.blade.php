@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background: #f7f7f7;
        color: #333;
    }

    .contact-page {
        width: 90%;
        max-width: 700px;
        margin: 60px auto;
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .contact-page h1 {
        font-size: 2.3rem;
        color: #27ae60;
        font-weight: 700;
        margin-bottom: 25px;
        text-transform: uppercase;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 25px;
    }

    label {
        font-weight: 600;
        text-align: left;
        margin-top: 10px;
        color: #444;
    }

    input, textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }

    input:focus, textarea:focus {
        outline: none;
        border-color: #27ae60;
        box-shadow: 0 0 6px rgba(39, 174, 96, 0.3);
    }

    textarea {
        resize: none;
        height: 120px;
    }

    .btn {
        background: #27ae60;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .btn:hover {
        background: #219150;
        transform: scale(1.05);
    }

    .location {
        margin-top: 20px;
        font-size: 1.1rem;
        color: #555;
    }

    .success-message {
        display: none;
        background: #27ae60;
        color: white;
        padding: 15px;
        border-radius: 8px;
        font-weight: 500;
        margin-top: 20px;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
        .contact-page {
            padding: 25px;
        }
        .contact-page h1 {
            font-size: 2rem;
        }
    }
</style>

<div class="container contact-page">
    <h1>Contact Us</h1>
    <form id="contact-form">
        <label>Email:</label>
        <input type="email" id="email" placeholder="Enter your email" required>

        <label>Phone:</label>
        <input type="text" id="phone" placeholder="Enter your phone number" required>

        <label>Message:</label>
        <textarea id="message" placeholder="Your message..." required></textarea>

        <button type="submit" class="btn">Send Message</button>
    </form>
    <div id="success-message" class="success-message">
        ✅ Thank you for contacting FitLife Gym! We’ll get back to you soon.
    </div>
    <p class="location"><strong>📍 Location:</strong> 123 Fitness Street, Downtown</p>
</div>

<script>
    document.getElementById("contact-form").addEventListener("submit", function(e) {
        e.preventDefault();

        // Simple validation
        const email = document.getElementById("email").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const message = document.getElementById("message").value.trim();

        if (!email || !phone || !message) {
            alert("Please fill in all fields before submitting.");
            return;
        }

        // Display success message
        document.getElementById("success-message").style.display = "block";

        // Clear form
        document.getElementById("contact-form").reset();

        // Hide message after a few seconds
        setTimeout(() => {
            document.getElementById("success-message").style.display = "none";
        }, 4000);
    });
</script>
@endsection
