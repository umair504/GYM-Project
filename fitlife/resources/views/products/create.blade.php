@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
<div class="container">
    <h1>Add New Product</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Product Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}" required>
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" name="image">
        </div>

        <button type="submit">Add Product</button>
    </form>
</div>
@endsection
