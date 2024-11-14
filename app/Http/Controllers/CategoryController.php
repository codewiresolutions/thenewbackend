<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create');  // Show the form to create a new category
    }

    // Create a new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'state' => 'required|boolean',
        ]);

        $category = Category::create($validated);
        return response()->json($category, 201);


        Category::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    // Show the form for editing an existing category
    public function edit($id)
    {
        $category = Category::findOrFail($id);  // Find the category by ID, or throw a 404 error
        return view('categories.edit', compact('category'));  // Pass the category data to the edit view
    }

    // Update an existing category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $category->id . '|max:255',
            'state' => 'required|boolean',
        ]);

        $category->update($validated);
        return response()->json($category);
    }

    // Delete a category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
