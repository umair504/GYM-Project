@extends('layouts.app')

@section('title', 'Membership Plans')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background: #f7f7f7;
        color: #333;
    }
    main {
        flex: 1; /* This pushes footer to the bottom */
    }

    .membership-page {
        width: 90%;
        margin: 60px auto;
        text-align: center;
    }

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
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
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

    .card p {
        font-size: 1.2rem;
        font-weight: 600;
        color: #27ae60;
        margin-bottom: 15px;
    }

    .card ul {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }

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
    }

    .btn:hover {
        background: #219150;
        transform: scale(1.05);
    }

    /* Color themes for each card */
    .bronze { border-top: 6px solid #cd7f32; }
    .silver { border-top: 6px solid #c0c0c0; }
    .gold { border-top: 6px solid #ffd700; }
    .platinum { border-top: 6px solid #e5e4e2; }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .membership-page h1 {
            font-size: 2rem;
        }
        .card {
            padding: 20px;
        }
    }
</style>

<div class="container membership-page">
    <h1>Membership Packages</h1>
    <div class="membership-grid">

        <div class="card bronze">
            <h2>Bronze</h2>
            <p>$20/month</p>
            <ul>
                <li>Basic Gym Access</li>
                <li>Locker Facility</li>
            </ul>
            <button class="btn">Choose Bronze</button>
        </div>

        <div class="card silver">
            <h2>Silver</h2>
            <p>$40/month</p>
            <ul>
                <li>Full Gym Access</li>
                <li>2 Personal Trainer Sessions</li>
                <li>Access to Group Classes</li>
            </ul>
            <button class="btn">Choose Silver</button>
        </div>

        <div class="card gold">
            <h2>Gold</h2>
            <p>$60/month</p>
            <ul>
                <li>Unlimited Access</li>
                <li>Personal Trainer</li>
                <li>Sauna & Spa</li>
                <li>Group Fitness Classes</li>
            </ul>
            <button class="btn">Choose Gold</button>
        </div>

        <div class="card platinum">
            <h2>Platinum</h2>
            <p>$90/month</p>
            <ul>
                <li>All Gold Benefits</li>
                <li>Nutrition Plan</li>
                <li>24/7 Gym Access</li>
                <li>Priority Booking</li>
            </ul>
            <button class="btn">Choose Platinum</button>
        </div>

        <div class="card diamond">
            <h2>Diamond</h2>
            <p>$120/month</p>
            <ul>
                <li>All Platinum Benefits</li>
                <li>Exclusive Fitness Workshops</li>
                <li>1-on-1 Diet Consultation</li>
                <li>Free Fitness Merchandise</li>
            </ul>
            <button class="btn">Choose Diamond</button>
        </div>

        <div class="card vip">
            <h2>VIP</h2>
            <p>$150/month</p>
            <ul>
                <li>Private Training Zone</li>
                <li>Unlimited Trainer Access</li>
                <li>Free Supplements</li>
                <li>Access to Fitness Lounge</li>
            </ul>
            <button class="btn">Choose VIP</button>
        </div>

        <div class="card elite">
            <h2>Elite</h2>
            <p>$200/month</p>
            <ul>
                <li>All VIP Benefits</li>
                <li>Physiotherapy Sessions</li>
                <li>Body Composition Tracking</li>
                <li>24/7 Personal Support</li>
            </ul>
            <button class="btn">Choose Elite</button>
        </div>

        <div class="card diamond-elite">
            <h2>Diamond Elite</h2>
            <p>$250/month</p>
            <ul>
                <li>All Elite Benefits</li>
                <li>Home Workout Planning</li>
                <li>Exclusive Gym Gear Kit</li>
                <li>Annual Fitness Retreat Pass</li>
            </ul>
            <button class="btn">Choose Diamond Elite</button>
        </div>

    </div>
</div>
@endsection
