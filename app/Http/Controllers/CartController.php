<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = auth()->user()->cartItems()->with(['product.primaryImage','product.brand','product.price'])->get();
        $totalPrice = 0;

        foreach($cartItems as $cartItem){
            $totalPrice += $cartItem->product->price->price * $cartItem->quantity;
        }

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::user();
        $productId = $request->product_id;
        $quantity = $request->quantity;

        $cartItem = $user->cartItems()->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $quantity);
        } else {
            $user->cartItems()->create([
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cartCount' => $user->cartItems()->sum('quantity')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        try {
            $request->validate([
                'quantity' => 'required|integer|min:1|max:100'
            ]);

            $cart->update([
                'quantity' => $request->quantity
            ]);

            return redirect()->back()->with('success', 'Quantity updated.');
        }
        catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Could not update quantity.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        try {
            if ($cart) {
                $cart->delete();
                return redirect()->back()->with('success', 'Product removed from your gear.');
            }

            return redirect()->back()->with('error', 'Item not found in your cart.');
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }
}
