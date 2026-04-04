<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query();

        if($request->has('search') && $request->search != '') {
            $keyword = $request->search;

            $query->where('id', 'like', '%' . $keyword . '%')
                ->orWhereHas('user', function ($q) use ($keyword) {
                    $q->where('email', 'like', '%' . $keyword . '%');
                });
        }

        if($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if($request->has('date_from') && $request->date_from != '') {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if($request->has('date_to') && $request->date_to != '') {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $orders = $query->latest()->paginate(20)->withQueryString();

        return view('admin.orders.index', compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
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
    public function update(Request $request, Order $order)
    {
        try {
            $order->update([
                'status' => 'shipped'
            ]);

            return redirect()->route('admin.orders.index')->with('success', 'Order #'. $order->id .' has been shipped');
        }
        catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            $order->update([
                'status' => 'cancelled'
            ]);

            return redirect()->route('admin.orders.index')->with('success', 'Order #'. $order->id .' has been cancelled');
        }
        catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
