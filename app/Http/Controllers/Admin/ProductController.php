<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Product::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Product added!');
    }

    public function edit(Product $product)
{
    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);

    $product->update($validated);

    return redirect()->route('admin.dashboard')->with('success', 'Product updated!');
}

public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Product deleted!');
}

}
