<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(15);

        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->validated();
        $category = new Category();
        try{
            $category->fill($data);
            $category->save();
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
        }

        return redirect()->route('admin.categories.index')->with('success', 'Category '. $category->name .' created successfully');
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try{
            $data = $request->validated();

            $category->update($data);
            $category->save();
            $message = "Category ID: " . $category->id . " Name: " . $category->name. " updated successfully";
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
        return redirect()->route('admin.categories.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $info = 'Successfully deleted: ID: '.$category->id. ' | Category name: '. $category->name;
        try {
            $category->delete();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect()->route('admin.categories.index')->with('success', $info);
    }
}
