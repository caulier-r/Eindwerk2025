<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartService
{
    /**
     * Add product to cart (alleen voor ingelogde users)
     */
    public function addToCart(Product $product, int $quantity = 1)
    {
        if (!Auth::check()) {
            throw new \Exception('You must be logged in to add items to cart');
        }

        $user = Auth::user();

        // Check of user dit product al gekocht heeft
        if ($this->hasUserPurchasedProduct($user, $product)) {
            throw new \Exception('You have already purchased this product');
        }

        // Check of product al in cart zit
        $existingCartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingCartItem) {
            throw new \Exception('This product is already in your cart');
        }

        // Voor FiveM plugins: quantity is altijd 1
        if ($product->category === 'FiveM Plugin') {
            $quantity = 1;
        }

        return CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $quantity
        ]);
    }

    /**
     * Remove product from cart
     */
    public function removeFromCart(Product $product)
    {
        if (!Auth::check()) {
            return false;
        }

        return CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();
    }

    /**
     * Get all cart items for current user
     */
    public function getCartItems()
    {
        if (!Auth::check()) {
            return collect();
        }

        return CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    /**
     * Get cart item count for current user
     */
    public function getCartCount()
    {
        if (!Auth::check()) {
            return 0;
        }

        return CartItem::where('user_id', Auth::id())->count();
    }

    /**
     * Get total cart price
     */
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

    /**
     * Clear entire cart for user
     */
    public function clearCart()
    {
        if (!Auth::check()) {
            return false;
        }

        return CartItem::where('user_id', Auth::id())->delete();
    }

    /**
     * Check if user has already purchased a product
     */
    protected function hasUserPurchasedProduct(User $user, Product $product)
    {
        // Check in orders table (gebruik client_id zoals in jouw database)
        return DB::table('orders')
            ->where('client_id', $user->id)
            ->where('status', 'paid')
            ->whereExists(function ($query) use ($product) {
                // Dit zal later worden uitgebreid wanneer je order_items tabel hebt
                // Voor nu simpele check
                $query->select(DB::raw(1));
            })
            ->exists();
    }

    /**
     * Check if product is in cart
     */
    public function isInCart(Product $product)
    {
        if (!Auth::check()) {
            return false;
        }

        return CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();
    }
}
