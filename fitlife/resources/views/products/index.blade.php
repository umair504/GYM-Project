@extends('layouts.app')

@section('title', 'Products - Admin')

@section('content')
<div class="container">
    <h1>Products</h1>

    @if(session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('products.create') }}" style="background:green;color:white;padding:8px 15px;border-radius:5px;">Add New Product</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%;margin-top:20px;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>${{ $product->price }}</td>
            <td>
                @if($product->image)
                    <img src="{{ $product->image }}" width="50" alt="{{ $product->name }}">
                @endif
            </td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
