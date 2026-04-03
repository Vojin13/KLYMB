<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $cartItems = $user->cartItems;

        if($cartItems->isEmpty()){
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $totalPrice = 0;

        foreach($cartItems as $cartItem){
            $totalPrice += $cartItem->product->price->price * $cartItem->quantity;
        }

        return view('checkout.index', compact('cartItems', 'totalPrice'));
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
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();
        $cartItems = $user->cartItems;

        try {
            DB::beginTransaction();

            $totalPrice = 0;

            foreach($cartItems as $cartItem){
                $totalPrice += $cartItem->product->price->price * $cartItem->quantity;
            }

            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'address' => $data['address'],
                'city' => $data['city'],
                'phone' => $data['phone'],
            ]);

            foreach($cartItems as $cartItem){
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price->price,
                    'product_name' => $cartItem->product->name,
                ]);
            }

            Cart::where('user_id', $user->id)->delete();

            DB::commit();
            return redirect()->route('cart.index')->with('success', 'Order created.');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return redirect()->route('cart.index')->with('error', $exception->getMessage());
        }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
