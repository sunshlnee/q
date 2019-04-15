<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'parent' => 'nullable|integer',
        ]);

        $category = Category::create([
            'title' => $request['title'],
            'parent_id' => $request['parent'],
        ]);
        
        return redirect()->route('admin.categories.show', $category);    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, Category $category)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'parent' => 'nullable|integer',
        ]);

        $category->update([
            'title' => $request['title'],
            'parent_id' => $request['parent'],
        ]);
    
        return redirect()->route('admin.categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');    }
}
