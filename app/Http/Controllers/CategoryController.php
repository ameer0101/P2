<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
     // Return all categories
     public function index()
     {
         $categories = Category::all();
         return response()->json(['categories' => $categories], 200);
     }

     // Create a new category
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|unique:categories'
         ]);

         $category = new Category;
         $category->name = $request->input('name');
         $category->save();

         return response()->json(['message' => 'Category created successfully.'], 201);
     }

     // Update an existing category
     public function update(Request $request, Category $category)
     {
         $request->validate([
             'name' => 'required|unique:categories'
         ]);

         $category->name = $request->input('name');
         $category->save();

         return response()->json(['message' => 'Category updated successfully.'], 200);
     }

     // Delete a category
     public function destroy(Category $category)
     {
         $category->delete();
         return response()->json(['message' => 'Category deleted successfully.'], 200);
     }
}
