<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function addToCart(Product $product, int $quantity = 1)
    {
        if (!Auth::check()) {
            throw new \Exception('You must be logged in to add items to cart');
        }

        return CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $quantity
        ]);
    }

    public function removeFromCart(Product $product)
    {
        if (!Auth::check()) {
            return false;
        }

        return CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();
    }

    public function getCartItems()
    {
        if (!Auth::check()) {
            return collect();
        }

        return CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function getCartCount()
    {
        if (!Auth::check()) {
            return 0;
        }

        return CartItem::where('user_id', Auth::id())->count();
    }

    public function getCartTotal()
    {
        if (!Auth::check()) {
            return 0;
        }

        return CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get()
            ->sum('total_price');
    }
}
