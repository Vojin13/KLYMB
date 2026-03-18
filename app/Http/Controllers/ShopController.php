<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $products = Product::query()->paginate(15);

        $categories = Category::all();
        $brands = Brand::all();

        return view('shop.index', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
    }
}
