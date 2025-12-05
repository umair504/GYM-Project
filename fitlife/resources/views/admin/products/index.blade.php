@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
        color: #333;
    }

    .container {
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h2 {
        color: #27ae60;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
    }

    .add-product-btn {
        background-color: #27ae60;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        margin-bottom: 30px;
        transition: 0.3s;
        text-decoration: none;
    }

    .add-product-btn:hover {
        background-color: #219150;
    }

    .alert-success {
        border-radius: 8px;
        padding: 12px 20px;
        margin-bottom: 20px;
        background-color: #27ae60;
        color: white;
        font-weight: 500;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 900px;
        text-align: center;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        width: 100%;
        max-width: 1200px;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .product-card img {
        width: 100%;
        height: 180px;
        border-radius: 8px;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .product-card h4 {
        margin: 10px 0;
        font-size: 1.2rem;
        color: #222;
        font-weight: 600;
    }

    .product-card p {
        color: #555;
        margin-bottom: 15px;
    }

    .price {
        color: #27ae60;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 15px;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn-primary, .btn-danger {
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-primary {
        background-color: #2980b9;
        color: white;
    }

    .btn-primary:hover {
        background-color: #1f6391;
    }

    .btn-danger {
        background-color: #c0392b;
        color: white;
    }

    .btn-danger:hover {
        background-color: #922b21;
    }

    @media(max-width: 768px) {
        .product-card img {
            height: 150px;
        }
    }
</style>

<div class="container">
    <h2>Products List</h2>

    <a href="{{ route('products.create') }}" class="add-product-btn">+ Add Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="product-grid">
        @foreach($products as $p)
            <div class="product-card">
                <img src="{{ $p->image_url }}" alt="{{ $p->name }}">
                <h4>{{ $p->name }}</h4>
                <p class="price">${{ $p->price }}</p>
                <p>{{ Str::limit($p->description, 80) }}</p>
                <div class="action-buttons">
                    <a href="{{ route('products.edit', $p->id) }}" class="btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this product?')" class="btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
