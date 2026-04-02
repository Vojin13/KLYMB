<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBadgeRequest;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Badge;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if($request->has('search') && $request->search != '') {
            $keyword = $request->search;
            $query->where('name', 'like', '%'.$keyword.'%')->orWhere('description', 'like', '%' . $keyword . '%');
        }

        if($request->has('date_from') && $request->date_from != '') {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if($request->has('date_to') && $request->date_to != '')
        {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $products = $query->latest()->paginate(20)->withQueryString();

        return view('admin.products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $badges = Badge::all();
        return view('admin.products.create', compact('brands', 'categories', 'badges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            $product = Product::create(Arr::only($data, ['name', 'description', 'brand_id', 'category_id', 'badge_id']));

            $product->prices()->create([
                'price' => $data['price'],
                'valid_from' => now(),
                'is_active' => true,
            ]);

            if($request->hasFile('images')){
                foreach ($request->file('images') as $index => $file) {

                    $filename = now()->format('Y-m-d_H-i-s') . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('products', $filename , 'public');


                    $product->images()->create([
                        'path' => $path,
                        'is_primary' => ($request->primary_image_index == $index) ? 1 : 0,
                        'position' => $request->positions[$index] ?? ($index + 1),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        }
        catch (\Exception $exception)
        {
            DB::rollBack();

            Log::error($exception->getMessage());
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
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $badges = Badge::all();
        return view('admin.products.edit' , compact('product' , 'brands' , 'categories', 'badges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try{
            $message = "Product: " . $product->name . " has been deleted.";
            $product->delete();
            return redirect()->route('admin.products.index')->with('success' , $message);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }
}
