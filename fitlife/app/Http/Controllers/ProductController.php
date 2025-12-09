<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products (Admin list page)
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function showFrontend()
    {
        $products = Product::all();
        return view('accessories', compact('products'));
    }


    // Add this method to your ProductController.php
public function search(Request $request)
{
    $query = $request->get('q');
    
    if (strlen($query) < 2) {
        return response()->json([]);
    }
    
    $results = Product::where('name', 'LIKE', "%{$query}%")
        ->orWhere('description', 'LIKE', "%{$query}%")
        ->limit(10)
        ->get(['id', 'name', 'price', 'image_url', 'description']);
    
    return response()->json($results);
}

    // Show create form
    public function create()
    {
        return view('admin.products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'required|url',
            'description' => 'nullable',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    // Show edit form
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'required|url',
            'description' => 'nullable',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
