<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with(['badge', 'primaryImage', 'price', 'brand', 'category']);

        if ($request->has('categories')) {
            $query->whereIn('category_id', function($q) use ($request) {
                $q->select('id')->from('categories')->whereIn('slug', $request->categories);
            });
        }

        if ($request->has('brands')) {
            $query->whereIn('brand_id', function($q) use ($request) {
                $q->select('id')->from('brands')->whereIn('slug', $request->brands);
            });
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('price_min')) {
            $query->whereHas('price', function($q) use ($request) {
                $q->where('price', '>=', $request->price_min);
            });
        }
        if ($request->filled('price_max')) {
            $query->whereHas('price', function($q) use ($request) {
                $q->where('price', '<=', $request->price_max);
            });
        }

        switch ($request->sort) {
            case 'low-to-high':
                $query->join('prices', 'products.id', '=', 'prices.product_id')
                    ->where('prices.is_active', true)
                    ->select('products.*')
                    ->orderBy('prices.price', 'asc');
                break;

            case 'high-to-low':
                $query->join('prices', 'products.id', '=', 'prices.product_id')
                    ->where('prices.is_active', true)
                    ->select('products.*')
                    ->orderBy('prices.price', 'desc');
                break;

            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;

            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;

            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(15)->withQueryString();
        $categories = Category::all();
        $brands = Brand::all();

        return view('shop.index', compact('products', 'categories', 'brands'));
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
    public function show(Product $product)
    {
        return view('shop.show', ['product' => $product]);
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
