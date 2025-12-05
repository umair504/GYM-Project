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
        margin-bottom: 30px;
        text-align: center;
    }

    form {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
    }

    .mb-3 {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #555;
    }

    input.form-control,
    textarea.form-control {
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        transition: 0.3s;
    }

    input.form-control:focus,
    textarea.form-control:focus {
        border-color: #27ae60;
        box-shadow: 0 0 6px rgba(39, 174, 96, 0.3);
        outline: none;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .btn-success {
        background-color: #27ae60;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-success:hover {
        background-color: #219150;
    }

    @media(max-width: 768px) {
        form {
            padding: 20px;
        }
    }
</style>

<div class="container">
    <h2>Add New Product</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter product name" required>
        </div>

        <div class="mb-3">
            <label for="price">Price ($):</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" placeholder="Enter product price" required>
        </div>

        <div class="mb-3">
            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" class="form-control" placeholder="Enter image URL" required>
        </div>

        <div class="mb-3">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" placeholder="Enter product description"></textarea>
        </div>

        <button type="submit" class="btn-success">Save Product</button>
    </form>
</div>
@endsection
