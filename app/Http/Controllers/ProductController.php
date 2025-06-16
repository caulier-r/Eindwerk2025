<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create'); // Was: products.create
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'featured' => 'boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $validated['image'] = $imageName;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product succesvol aangemaakt.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product')); // Was: products.edit
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product')); // Was: products.show
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Verwijder oude afbeelding als die bestaat
            if ($product->image) {
                Storage::delete('public/images/' . $product->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $validated['image'] = $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product succesvol bijgewerkt.');
    }

    public function destroy(Product $product)
    {
        // Verwijder de afbeelding als die bestaat
        if ($product->image) {
            Storage::delete('public/images/' . $product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product succesvol verwijderd.');
    }
}
