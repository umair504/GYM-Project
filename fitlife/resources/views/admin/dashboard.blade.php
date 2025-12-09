@extends('layouts.app')

@section('title', 'Admin Dashboard | Fitlife')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
        color: #333;
    }

    .dashboard-container {
        margin-top: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h3.dashboard-title {
        color: #27ae60;
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        width: 100%;
        max-width: 1200px;
    }

    .dashboard-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .dashboard-card img {
        width: 100%;
        height: 180px;
        border-radius: 8px;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .dashboard-card h5 {
        margin-bottom: 8px;
        font-weight: 600;
        color: #222;
    }

    .dashboard-card p {
        color: #555;
        font-size: 0.85rem;
        margin-bottom: 15px;
    }

    .dashboard-card .btn {
        border-radius: 8px;
        font-weight: 500;
        transition: 0.3s;
    }

    .dashboard-card .btn-primary:hover {
        background-color: #1f6391;
    }

    @media(max-width: 768px) {
        .dashboard-card img {
            height: 150px;
        }
    }
</style>

<div class="dashboard-container">

    <h3 class="dashboard-title">Admin Dashboard</h3>

    <div class="dashboard-grid">

        {{-- Products --}}
        <div class="dashboard-card">
            <img src="https://static.vecteezy.com/system/resources/previews/021/916/452/non_2x/gear-with-hexagonal-and-particle-for-white-technology-background-concept-illustration-vector.jpg" alt="Products">
            <h5>Products</h5>
            <p class="text-muted small">Module One</p>
            <a href="{{ $links['products'] }}" class="btn btn-primary w-100">Open</a>
        </div>

        {{-- Membership Plans --}}
        <div class="dashboard-card">
            <img src="https://png.pngtree.com/background/20220731/original/pngtree-white-background-gear-workshop-technology-drawing-picture-image_1911927.jpg" alt="Membership Plans">
            <h5>Membership Plans</h5>
            <p class="text-muted small">Module Two</p>
            <a href="{{ $links['membership-plans'] }}" class="btn btn-primary w-100">Open</a>
        </div>

        {{-- You can add more modules here in the same style --}}

    </div>

</div>
@endsection
