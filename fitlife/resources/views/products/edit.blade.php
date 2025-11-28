@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Product Name:</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
        </div>

        <div>
            <label for="image">Image:</label>
            @if($product->image)
                <div>
                    <img src="{{ $product->image }}" width="100" alt="{{ $product->name }}">
                </div>
            @endif
            <input type="file" name="image">
        </div>

        <button type="submit">Update Product</button>
    </form>
</div>
@endsection
