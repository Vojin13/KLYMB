<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(10);

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBrandRequest $request)
    {
        $data = $request->validated();

        try{
            $brand = Brand::create($data);
            $message = "Brand: " . $brand->name . " has been created successfully.";
            return redirect()->route('admin.brands.index')->with('success', $message);
        }
        catch (\Exception $exception){
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
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();
        try {
            $brand->update($data);
            $message = "Brand: " . $brand->name . " has been updated successfully.";
            return redirect()->route('admin.brands.index')->with('success', $message);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $message = "Brand: " . $brand->name . " has been deleted successfully.";
            $brand->delete();
            return redirect()->route('admin.brands.index')->with('success', $message);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }
}
