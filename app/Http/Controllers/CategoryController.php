<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    //constructor


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get(); //mengambil data category terbaru dan menampilkan 10 data per halaman

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Category";
        $description = "Halaman untuk membuat category baru";

        return view('categories.create', [
            'title' => $title,
            'description' => $description
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        /// add slug
        $request->merge([
            'slug' => Str::slug($request->name) // database-nosql
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'is_active' => $request->is_active ? true : false
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('posts')->findOrFail($id);

        return view('categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Category::findOrFail($id); //select * from categories where id = $id limit 1

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {

            $request->validate([
                'name' => 'required|unique:categories,name,' . $id
            ]);

            $category = Category::findOrFail($id);

            /// add slug
            $request->merge([
                'slug' => Str::slug($request->name) // database-nosql
            ]);

            $category->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'is_active' => $request->is_active ? true : false
            ]);

            return redirect()->route('categories.index')->with('success', 'Category updated successfully.');

        }
        
        catch (Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Category not found error on update function.'. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
